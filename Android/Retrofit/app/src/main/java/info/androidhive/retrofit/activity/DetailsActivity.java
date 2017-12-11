package info.androidhive.retrofit.activity;

import android.graphics.Color;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.View;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;
import android.widget.Toast;

import com.squareup.picasso.Picasso;

import info.androidhive.retrofit.App;
import info.androidhive.retrofit.R;
import info.androidhive.retrofit.adapter.UserBasicAdapter;
import info.androidhive.retrofit.adapter.UserDescAdapter;
import info.androidhive.retrofit.adapter.UserGiftAdapter;
import info.androidhive.retrofit.adapter.UserMatchAdapter;
import info.androidhive.retrofit.adapter.UserPhotoAdapter;
import info.androidhive.retrofit.model.Option;
import info.androidhive.retrofit.model.UserDetailData;
import info.androidhive.retrofit.model.UserDetailResponse;
import info.androidhive.retrofit.model.UserDetailTag;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class DetailsActivity extends AppCompatActivity {

    private static final String TAG = DetailsActivity.class.getSimpleName();
    private String userId;
    private ImageView imgUser;
    private RecyclerView rvBasic;
    private RecyclerView rvPhotos;
    private RecyclerView rvGifts;
    private RecyclerView rvDesc;
    private LinearLayout layoutSport;
    private LinearLayout layoutTag;
    private FlowLayout layoutTags;
    private RecyclerView rvMatch;
    private View layoutSportRoot;
    private View layoutTagRoot;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_details);

        this.userId = getIntent().getStringExtra("userId");
        this.imgUser = (ImageView) findViewById(R.id.imgUser);
        this.rvBasic = (RecyclerView) findViewById(R.id.basicRV);
        this.rvBasic.setLayoutManager(new LinearLayoutManager(this));
        this.rvPhotos = (RecyclerView) findViewById(R.id.photosRV);
        this.rvPhotos.setLayoutManager(new LinearLayoutManager(this, LinearLayoutManager.HORIZONTAL, false));
        this.rvGifts = (RecyclerView) findViewById(R.id.giftsRV);
        this.rvGifts.setLayoutManager(new LinearLayoutManager(this, LinearLayoutManager.HORIZONTAL, false));
        this.rvDesc = (RecyclerView) findViewById(R.id.descRV);
        this.rvDesc.setLayoutManager(new LinearLayoutManager(this));

        this.layoutSport = (LinearLayout) findViewById(R.id.layoutSportTexts);
        this.layoutTag = (LinearLayout) findViewById(R.id.layoutTagTexts);
        this.layoutTags = (FlowLayout) findViewById(R.id.layoutTagsTexts);

        this.layoutSportRoot = findViewById(R.id.layoutSport);
        this.layoutTagRoot = findViewById(R.id.layoutTag);

        this.rvMatch = (RecyclerView) findViewById(R.id.matchRV);
        this.rvMatch.setLayoutManager(new LinearLayoutManager(this));

        loadUser();
    }

    private void loadUser() {
        if (!loadFromDB()) {
            loadFromAPI();
        }
    }

    private boolean loadFromDB() {
        UserDetailData userData = RealmController.with(this).getUser(this.userId);

        if (userData == null)
            return false;

        loadUI(userData);
        return true;
    }

    private void saveOnDB(UserDetailData user) {
        RealmController.with(this).saveUser(user);
    }

    private void loadFromAPI() {

        Call<UserDetailResponse> call = App.apiService.getUserDetail(this.userId);
        call.enqueue(new Callback<UserDetailResponse>() {
            @Override
            public void onResponse(Call<UserDetailResponse> call, Response<UserDetailResponse> response) {
                UserDetailData userData = response.body().getData();
                loadUI(userData);
                saveOnDB(userData);
            }

            @Override
            public void onFailure(Call<UserDetailResponse> call, Throwable t) {
                // Log error here since request failed
                Log.e(TAG, t.toString());
                Toast.makeText(getApplicationContext(), "No internet connection, try again later!", Toast.LENGTH_SHORT).show();
                finish();
            }
        });
    }

    private void loadUI(UserDetailData userData) {
        setTitle(userData.getMain().getDisplayName());

        String userImgUrl = "http://eadate.com/images/user/" + userData.getMain().getMainImage();
        Picasso.with(this).load(userImgUrl).into(this.imgUser);

        this.rvBasic.setAdapter(new UserBasicAdapter(userData.getBasic(), getApplicationContext()));
        this.rvPhotos.setAdapter(new UserPhotoAdapter(userData.getImage(), getApplicationContext()));
        this.rvGifts.setAdapter(new UserGiftAdapter(userData.getGift(), getApplicationContext()));
        this.rvDesc.setAdapter(new UserDescAdapter(userData.getDescription(), getApplicationContext()));
        this.rvMatch.setAdapter(new UserMatchAdapter(userData.getMatch(), getApplicationContext()));

        if (userData.getOption() != null) {
            for (Option option : userData.getOption()) {
                if (option.getTitle().equals("Sport")) {
                    for (String sport : option.getContent()) {
                        this.layoutSport.addView(buildTextView(sport));
                    }
                } else if (option.getTitle().equals("Tag")) {
                    for (String tag : option.getContent()) {
                        this.layoutTag.addView(buildTextView(tag));
                    }
                }
            }
        } else {
            this.layoutSportRoot.setVisibility(View.GONE);
            this.layoutTagRoot.setVisibility(View.GONE);
        }

        if (userData.getTag() != null) {
            for (UserDetailTag tag : userData.getTag()) {
                this.layoutTags.addView(buildTextView(tag.getTitle()));
            }
        }
    }

    private TextView buildTextView(String text) {
        TextView txt = new TextView(this);
        txt.setText(text);
        txt.setTextColor(Color.WHITE);
        txt.setTextSize(16);
        LinearLayout.LayoutParams params = new LinearLayout.LayoutParams(
                LinearLayout.LayoutParams.WRAP_CONTENT,
                LinearLayout.LayoutParams.WRAP_CONTENT
        );
        params.setMargins(0, 0, 20, 0);
        txt.setLayoutParams(params);
        txt.setPadding(30, 10, 30, 10);
        txt.setBackgroundResource(R.drawable.red_txt_drawable);
        return txt;
    }
}
