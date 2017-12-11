package info.androidhive.retrofit.model;

import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

import io.realm.RealmObject;

/**
 * Created by Pedro on 2017-12-10.
 */

public class UserDetailResponse extends RealmObject {

    @SerializedName("data")
    @Expose
    private UserDetailData data;
    @SerializedName("message")
    @Expose
    private String message;
    @SerializedName("code")
    @Expose
    private int code;

    public UserDetailData getData() {
        return data;
    }

    public void setData(UserDetailData data) {
        this.data = data;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }

    public int getCode() {
        return code;
    }

    public void setCode(int code) {
        this.code = code;
    }
}
