package fr.MowItNow.implementation;

import fr.MowItNow.interfaces.Position;

import java.util.Objects;

public class PositionImpl implements Position{

    private int x, y;

    public PositionImpl(int x, int y) {
        this.x = x;
        this.y = y;
    }

    public int getX() {
        return x;
    }

    public int getY() {
        return y;
    }

    public void setX(int x) {
        this.x = x;
    }

    public void setY(int y) {
        this.y = y;
    }

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (!(o instanceof PositionImpl)) return false;
        PositionImpl position = (PositionImpl) o;
        return x == position.x && y == position.y;
    }
}
