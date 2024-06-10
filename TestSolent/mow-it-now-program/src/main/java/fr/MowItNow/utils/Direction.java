package fr.MowItNow.utils;

public enum Direction {
    N, E, S, W;


    public Direction pivoterDroite() {
        int v = (ordinal() + 1) % 4;
        return values()[v];

    }

    public Direction pivoterGauche() {
        int v = (ordinal() + 3) % 4;
        return values()[v];
    }
}
