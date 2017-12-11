package info.androidhive.retrofit.activity;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.widget.Toast;

import java.util.List;

import info.androidhive.retrofit.App;
import info.androidhive.retrofit.R;
import info.androidhive.retrofit.adapter.UserInfoAdapter;
import info.androidhive.retrofit.model.UserInfo;
import info.androidhive.retrofit.model.UserInfoResponse;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class MainActivity extends AppCompatActivity implements UserInfoAdapter.OnUserItemClicked {

    private static final String TAG = MainActivity.class.getSimpleName();
    // TODO - insert your themoviedb.org API KEY here
    private final static String API_KEY = "7e8f60e325cd06e164799af1e317d7a7";
    private RecyclerView recyclerView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        if (API_KEY.isEmpty()) {
            Toast.makeText(getApplicationContext(), "Please obtain your API KEY from themoviedb.org first!", Toast.LENGTH_LONG).show();
            return;
        }

        this.recyclerView = (RecyclerView) findViewById(R.id.movies_recycler_view);
        this.recyclerView.setLayoutManager(new LinearLayoutManager(this));

        loadUsers();
    }

    private void loadUsers() {
        if (!loadFromDB()) {
            loadFromAPI();
        }
    }

    private void loadFromAPI() {

        Call<UserInfoResponse> call = App.apiService.getUserInfo();
        call.enqueue(new Callback<UserInfoResponse>() {
            @Override
            public void onResponse(Call<UserInfoResponse> call, Response<UserInfoResponse> response) {
                int statusCode = response.code();
                List<UserInfo> userInfos = response.body().getData();
                loadUI(userInfos);
                saveOnDB(userInfos);
            }

            @Override
            public void onFailure(Call<UserInfoResponse> call, Throwable t) {
                // Log error here since request failed
                Log.e(TAG, t.toString());
            }
        });
    }

    private void loadUI(List<UserInfo> userInfos) {
        this.recyclerView.setAdapter(new UserInfoAdapter(userInfos, R.layout.list_item_userinfo, getApplicationContext(), MainActivity.this));
    }

    private void saveOnDB(List<UserInfo> userInfos) {
        RealmController.with(this).saveUsers(userInfos);
    }

    private boolean loadFromDB() {
        List<UserInfo> userInfos = RealmController.with(this).getUsers();

        if (userInfos.size() == 0)
            return false;

        loadUI(userInfos);
        return true;
    }

    @Override
    public void onUserItemClicked(UserInfo user) {
        Log.d(TAG, "onUserItemClicked: " + user.getDisplayName());

        Intent intent = new Intent(this, DetailsActivity.class);
        intent.putExtra("userId", user.getId());
        startActivity(intent);
    }
}
