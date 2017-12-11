package info.androidhive.retrofit.activity;

import android.app.Activity;
import android.app.Application;

import java.util.List;

import info.androidhive.retrofit.model.UserDetailData;
import info.androidhive.retrofit.model.UserInfo;
import io.realm.Realm;
import io.realm.RealmResults;

/**
 * Created by Pedro on 2017-12-10.
 */

public class RealmController {
    private static RealmController instance;
    private final Realm realm;

    public RealmController(Application application) {
        realm = Realm.getDefaultInstance();
    }

    public static RealmController with(Activity activity) {
        if (instance == null) {
            instance = new RealmController(activity.getApplication());
        }
        return instance;
    }

    //find all objects in the Book.class
    public RealmResults<UserInfo> getUsers() {
        return realm.where(UserInfo.class).findAll();
    }

    //query a single item with the given id
    public UserDetailData getUser(String id) {
        return realm.where(UserDetailData.class).equalTo("id", id).findFirst();
    }

    public void saveUsers(List<UserInfo> users) {
        for (UserInfo user : users) {
            realm.beginTransaction();
            realm.copyToRealm(user);
            realm.commitTransaction();
        }
    }

    public void saveUser(UserDetailData user) {
        realm.beginTransaction();
        realm.copyToRealm(user);
        realm.commitTransaction();
    }

}
