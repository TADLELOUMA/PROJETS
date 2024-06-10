package fr.MowItNow.implementation;

import java.io.File;
import java.io.FileNotFoundException;
import java.util.Arrays;
import java.util.Scanner;

import fr.MowItNow.exception.InvalidFileInput;

/**
 * class that reads the file and initializes the lawn.
 */
public class InputReader {
    private LawnImpl lawn;

    public InputReader(String filepath){
        getLawnFromFile(filepath);
    }

    public LawnImpl getLawn() {
        return lawn;
    }

    private void getLawnFromFile(String file) {
        Scanner myReader = null;
        try {
            File inputFile = new File(file);
            myReader = new Scanner(inputFile);

            if(myReader.hasNextLine()){
                this.getLawnSizeFromFile(myReader.nextLine());
            }
            while (myReader.hasNextLine()) {
                this.getMowerFromLine(myReader);
            }

        } catch (FileNotFoundException e) {
            e.printStackTrace();
        } catch (InvalidFileInput e) {
            e.printStackTrace();
        }
        finally{
            if(myReader != null){
                myReader.close();
            }
        }
    }

    private void getMowerFromLine(Scanner input) {
        String instructions = "";
        String position = input.nextLine();
        String[] positionTab= position.split(" ");
        int x = Integer.parseInt(positionTab[0]);
        int y = Integer.parseInt(positionTab[1]);
        String direction = positionTab[2];
        MowerImpl mower = null;
        if(this.lawn!=null && this.lawn.checkValidPosition(x, y)){
            mower = new MowerImpl(x, y,direction);
        }
        if(input.hasNextLine()){
            assert mower != null;
            mower.setInstructions(input.nextLine());
        }
        this.lawn.addMower(mower);

    }

    private void getLawnSizeFromFile(String input) throws InvalidFileInput{
        int[] lawnSizeTab= Arrays.stream(input.split(" ")).mapToInt(Integer::parseInt).toArray();

        if(lawnSizeTab.length !=2){
            throw new InvalidFileInput("Lawn size not properly recovered");
        }
        this.lawn = new LawnImpl(lawnSizeTab[0], lawnSizeTab[1]);
    }
}
