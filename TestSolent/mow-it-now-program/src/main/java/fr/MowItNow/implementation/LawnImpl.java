package fr.MowItNow.implementation;

import java.util.ArrayList;
import java.util.List;
import java.util.Objects;
import java.util.StringJoiner;

import fr.MowItNow.interfaces.Lawn;

public class LawnImpl implements Lawn {
    private int xMax;
    private int yMax;

    private  List<MowerImpl> mowers;
    
    public LawnImpl(int xMax, int yMax, List<MowerImpl> mowers) {
        this.xMax = xMax;
        this.yMax = yMax;
        this.mowers = mowers;
    }

    public LawnImpl(int xMax, int yMax) {
        this.xMax = xMax;
        this.yMax = yMax;
        this.mowers = new ArrayList<>();
    }
    
    public int getxMax() {
        return xMax;
    }


    public int getyMax() {
        return yMax;
    }

    public List<MowerImpl> getmowers() {
        return mowers;
    }

    public boolean checkValidPosition(int x, int y) {
        return (x >= 0 && x <= xMax && y >= 0 && y <= yMax);
    }

    public void addMower(MowerImpl mower) {
        this.mowers.add(mower);
    }
    
    public String moveMowers(){
        StringJoiner results = new StringJoiner(" ");
        mowers.forEach(mower -> {
            mower.followInstructions(this);
            results.add(mower.toString());
        });
        return results.toString();
    }

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (!(o instanceof LawnImpl)) return false;
        LawnImpl lawn = (LawnImpl) o;
        return xMax == lawn.xMax && yMax == lawn.yMax && Objects.equals(mowers, lawn.mowers);
    }
}
