package info.androidhive.retrofit.rest;

import info.androidhive.retrofit.model.MoviesResponse;
import info.androidhive.retrofit.model.UserDetailResponse;
import info.androidhive.retrofit.model.UserInfoResponse;
import retrofit2.Call;
import retrofit2.http.GET;
import retrofit2.http.Path;
import retrofit2.http.Query;


public interface ApiInterface {
    @GET("movie/top_rated")
    Call<MoviesResponse> getTopRatedMovies(@Query("api_key") String apiKey);

    @GET("movie/{id}")
    Call<MoviesResponse> getMovieDetails(@Path("id") int id, @Query("api_key") String apiKey);


    @GET("userInfo")
    Call<UserInfoResponse> getUserInfo();

    @GET("userInfo/{id}")
    Call<UserDetailResponse> getUserDetail(@Path("id") String id);
}
