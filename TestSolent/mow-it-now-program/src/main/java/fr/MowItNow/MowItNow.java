package fr.MowItNow;

import fr.MowItNow.implementation.InputReader;
import fr.MowItNow.implementation.LawnImpl;

/**
 * Main class to operate lawnmowers.
 */
public class MowItNow {

    public static String mowItNow(InputReader input){
        LawnImpl lawn = input.getLawn();
        return lawn.moveMowers();

    }
    public static void main(String[] args) {
        InputReader input = new InputReader("src/test/java/fr/MowItNow/input.txt");
        String output = mowItNow(input);
        System.out.println(output);
    }
}
