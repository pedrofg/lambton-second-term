package info.androidhive.retrofit.model;

import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

import io.realm.RealmObject;

/**
 * Created by Pedro on 2017-12-10.
 */

public class Main extends RealmObject {

    @SerializedName("loginDate")
    @Expose
    private String loginDate;
    @SerializedName("mainImage")
    @Expose
    private String mainImage;
    @SerializedName("displayName")
    @Expose
    private String displayName;
    @SerializedName("signature")
    @Expose
    private String signature;
    @SerializedName("birthday")
    @Expose
    private String birthday;
    @SerializedName("gender")
    @Expose
    private int gender;
    @SerializedName("sexualOrientation")
    @Expose
    private int sexualOrientation;
    @SerializedName("height")
    @Expose
    private int height;
    @SerializedName("weight")
    @Expose
    private int weight;
    @SerializedName("latitude")
    @Expose
    private double latitude;
    @SerializedName("longitude")
    @Expose
    private double longitude;
    @SerializedName("accurateLocation")
    @Expose
    private boolean accurateLocation;
    @SerializedName("city")
    @Expose
    private String city;
    @SerializedName("dateType")
    @Expose
    private int dateType;

    public String getLoginDate() {
        return loginDate;
    }

    public void setLoginDate(String loginDate) {
        this.loginDate = loginDate;
    }

    public String getMainImage() {
        return mainImage;
    }

    public void setMainImage(String mainImage) {
        this.mainImage = mainImage;
    }

    public String getDisplayName() {
        return displayName;
    }

    public void setDisplayName(String displayName) {
        this.displayName = displayName;
    }

    public String getSignature() {
        return signature;
    }

    public void setSignature(String signature) {
        this.signature = signature;
    }

    public String getBirthday() {
        return birthday;
    }

    public void setBirthday(String birthday) {
        this.birthday = birthday;
    }

    public int getGender() {
        return gender;
    }

    public void setGender(int gender) {
        this.gender = gender;
    }

    public int getSexualOrientation() {
        return sexualOrientation;
    }

    public void setSexualOrientation(int sexualOrientation) {
        this.sexualOrientation = sexualOrientation;
    }

    public int getHeight() {
        return height;
    }

    public void setHeight(int height) {
        this.height = height;
    }

    public int getWeight() {
        return weight;
    }

    public void setWeight(int weight) {
        this.weight = weight;
    }

    public double getLatitude() {
        return latitude;
    }

    public void setLatitude(double latitude) {
        this.latitude = latitude;
    }

    public double getLongitude() {
        return longitude;
    }

    public void setLongitude(double longitude) {
        this.longitude = longitude;
    }

    public boolean isAccurateLocation() {
        return accurateLocation;
    }

    public void setAccurateLocation(boolean accurateLocation) {
        this.accurateLocation = accurateLocation;
    }

    public String getCity() {
        return city;
    }

    public void setCity(String city) {
        this.city = city;
    }

    public int getDateType() {
        return dateType;
    }

    public void setDateType(int dateType) {
        this.dateType = dateType;
    }

}
