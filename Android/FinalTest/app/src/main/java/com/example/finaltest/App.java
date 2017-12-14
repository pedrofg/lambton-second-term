package com.example.finaltest;

import android.app.Application;

import io.realm.Realm;

/**
 * Created by macstudent on 2017-12-13.
 */

public class App extends Application {

    @Override
    public void onCreate() {
        super.onCreate();
        Realm.init(this);
    }
}