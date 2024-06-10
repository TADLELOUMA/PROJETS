package fr.MowItNow;

import fr.MowItNow.implementation.InputReader;
import fr.MowItNow.implementation.LawnImpl;
import fr.MowItNow.implementation.MowerImpl;
import org.junit.jupiter.api.Assertions;
import org.junit.jupiter.api.Test;

/**
 * Unit-level testing for InputReader object.
 */
public class InputReaderTest {

    @Test
    public void shouldTestProgramInputReader() {
        InputReader input = new InputReader("src/test/java/fr/MowItNow/input.txt");

        LawnImpl lawnExpected = new LawnImpl(5,5);

        MowerImpl mower1 = new MowerImpl(1,2,"N");
        mower1.setInstructions("GAGAGAGAA");
        MowerImpl mower2 = new MowerImpl(3,3,"E");
        mower2.setInstructions("AADAADADDA");

        lawnExpected.addMower(mower1);
        lawnExpected.addMower(mower2);

        // Verify the output
        LawnImpl lawnOutput = input.getLawn();

        Assertions.assertEquals(lawnExpected, lawnOutput);
    }
}
