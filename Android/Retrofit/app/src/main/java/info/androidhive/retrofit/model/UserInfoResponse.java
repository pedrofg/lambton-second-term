package info.androidhive.retrofit.model;

import com.google.gson.annotations.SerializedName;

import io.realm.RealmList;
import io.realm.RealmObject;

/**
 * Created by macstudent on 2017-12-04.
 */

public class UserInfoResponse extends RealmObject {
    @SerializedName("data")
    private RealmList<UserInfo> data;

    @SerializedName("message")
    private String message;

    @SerializedName("code")
    private Integer code;

    public RealmList<UserInfo> getData() {
        return data;
    }

    public void setData(RealmList<UserInfo> data) {
        this.data = data;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }

    public Integer getCode() {
        return code;
    }

    public void setCode(Integer code) {
        this.code = code;
    }
}
