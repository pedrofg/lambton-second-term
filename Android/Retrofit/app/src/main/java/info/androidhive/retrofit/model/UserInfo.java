package info.androidhive.retrofit.model;

import com.google.gson.annotations.SerializedName;

import io.realm.RealmObject;
import io.realm.annotations.PrimaryKey;

/**
 * Created by macstudent on 2017-12-04.
 */

public class UserInfo extends RealmObject {

    @PrimaryKey
    @SerializedName("id")
    private String id;
    @SerializedName("displayName")
    private String displayName;
    @SerializedName("gender")
    private Integer gender;
    @SerializedName("birthday")
    private String birthday;
    @SerializedName("height")
    private Integer height;
    @SerializedName("signature")
    private String signature;
    @SerializedName("mainImage")
    private String mainImage;
    @SerializedName("city")
    private String city;
    @SerializedName("latitude")
    private Double latitude;
    @SerializedName("longitude")
    private Double longitude;

    public UserInfo() {

    }

    public UserInfo(String id, String displayName, Integer gender, String birthday,
                    Integer height, String signature, String mainImage, String city,
                    Double latitude, Double longitude) {
        this.id = id;
        this.displayName = displayName;
        this.gender = gender;
        this.birthday = birthday;
        this.height = height;
        this.signature = signature;
        this.mainImage = mainImage;
        this.city = city;
        this.latitude = latitude;
        this.longitude = longitude;
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getDisplayName() {
        return displayName;
    }

    public void setDisplayName(String displayName) {
        this.displayName = displayName;
    }

    public Integer getGender() {
        return gender;
    }

    public void setGender(Integer gender) {
        this.gender = gender;
    }

    public String getBirthday() {
        return birthday;
    }

    public void setBirthday(String birthday) {
        this.birthday = birthday;
    }

    public Integer getHeight() {
        return height;
    }

    public void setHeight(Integer height) {
        this.height = height;
    }

    public String getSignature() {
        return signature;
    }

    public void setSignature(String signature) {
        this.signature = signature;
    }

    public String getMainImage() {
        return mainImage;
    }

    public void setMainImage(String mainImage) {
        this.mainImage = mainImage;
    }

    public String getCity() {
        return city;
    }

    public void setCity(String city) {
        this.city = city;
    }

    public Double getLatitude() {
        return latitude;
    }

    public void setLatitude(Double latitude) {
        this.latitude = latitude;
    }

    public Double getLongitude() {
        return longitude;
    }

    public void setLongitude(Double longitude) {
        this.longitude = longitude;
    }
}
