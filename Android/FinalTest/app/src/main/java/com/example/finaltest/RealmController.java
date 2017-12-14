package com.example.finaltest;

import android.app.Activity;
import android.app.Application;

import java.util.List;

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

    public Realm getRealm() {
        return realm;
    }

    //find all objects in the Book.class
    public RealmResults<User> getUsers() {
        return realm.where(User.class).findAll();
    }

    //query a single item with the given id
    public User getUser(String id) {
        return realm.where(User.class).equalTo("id", id).findFirst();
    }

    public void saveUser(User user) {
        realm.beginTransaction();
        realm.copyToRealm(user);
        realm.commitTransaction();
    }

    public void removeUser(User user) {
        realm.beginTransaction();
        RealmResults<User> rows = realm.where(User.class).equalTo("id", user.getId()).findAll();
        rows.deleteAllFromRealm();
        realm.commitTransaction();
    }

}
