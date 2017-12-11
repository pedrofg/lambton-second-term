package info.androidhive.retrofit;

import android.app.Application;

import info.androidhive.retrofit.rest.ApiClient;
import info.androidhive.retrofit.rest.ApiInterface;
import io.realm.Realm;

/**
 * Created by Pedro on 2017-12-10.
 */

public class App extends Application {
    public static ApiInterface apiService;

    @Override
    public void onCreate() {
        super.onCreate();
        apiService = ApiClient.getClient().create(ApiInterface.class);
        Realm.init(this);
    }
}
