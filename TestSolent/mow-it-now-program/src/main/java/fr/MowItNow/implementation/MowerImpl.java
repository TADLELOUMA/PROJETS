package fr.MowItNow.implementation;

import fr.MowItNow.interfaces.Lawn;
import fr.MowItNow.interfaces.Mower;
import fr.MowItNow.utils.Direction;

import java.util.Objects;

public class MowerImpl implements Mower {

    private PositionImpl position;

    private Direction direction;

    private String instructions;

    public MowerImpl(PositionImpl position) {
        this.position = position;
    }

    public MowerImpl(int x, int y, String direction) {
        this.position = new PositionImpl(x,y);
        this.direction = Direction.valueOf(direction);
    }

    public PositionImpl getPosition() {
        return position;
    }

    public Direction getOrientation() {
        return direction;
    }

    @Override
    public void move(Lawn lawn) {
        int newX = position.getX();
        int newY = position.getY();
        switch (direction) {
            case N:
                newY = newY + 1;
                break;
            case W:
                newX = newX - 1;
                break;
            case S:
                newY = newY - 1;
                break;
            case E:
                newX = newX + 1;
                break;
            default:
                break;
            
        }
        if(lawn.checkValidPosition(newX, newY)){
            position.setX(newX);
            position.setY(newY);
        }
    }

    public void setInstructions(String instructions) {
        this.instructions = instructions;
    }

    @Override
    public String toString() {
        return position.getX() + " " + position.getY() + " " + direction;
    }

    @Override
    public void followInstructions(Lawn lawn) {
        for (int i = 0; i < instructions.length(); i++) {
            switch (instructions.charAt(i)) {
                case 'D': this.direction= direction.pivoterDroite();
                    break;
                    case 'G': this.direction = direction.pivoterGauche();
                    
                    break;
                    case 'A': move(lawn);;
                    
                    break;
            
                default:
                    break;
            }
        }
    }

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (!(o instanceof MowerImpl)) return false;
        MowerImpl mower = (MowerImpl) o;
        return Objects.equals(position, mower.position) && direction == mower.direction && Objects.equals(instructions, mower.instructions);
    }
}
