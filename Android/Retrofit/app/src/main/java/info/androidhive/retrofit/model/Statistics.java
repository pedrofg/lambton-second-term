package info.androidhive.retrofit.model;

import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

import io.realm.RealmObject;

/**
 * Created by Pedro on 2017-12-10.
 */

public class Statistics extends RealmObject {

    @SerializedName("favourite")
    @Expose
    private int favourite;
    @SerializedName("attitude")
    @Expose
    private int attitude;
    @SerializedName("comment")
    @Expose
    private int comment;
    @SerializedName("image")
    @Expose
    private int image;
    @SerializedName("report")
    @Expose
    private int report;

    public int getFavourite() {
        return favourite;
    }

    public void setFavourite(int favourite) {
        this.favourite = favourite;
    }

    public int getAttitude() {
        return attitude;
    }

    public void setAttitude(int attitude) {
        this.attitude = attitude;
    }

    public int getComment() {
        return comment;
    }

    public void setComment(int comment) {
        this.comment = comment;
    }

    public int getImage() {
        return image;
    }

    public void setImage(int image) {
        this.image = image;
    }

    public int getReport() {
        return report;
    }

    public void setReport(int report) {
        this.report = report;
    }

}
