package info.androidhive.retrofit.adapter;

import android.content.Context;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;

import com.squareup.picasso.Picasso;

import java.util.List;

import info.androidhive.retrofit.R;
import info.androidhive.retrofit.model.UserDetailImage;

/**
 * Created by macstudent on 2017-12-04.
 */

public class UserPhotoAdapter extends RecyclerView.Adapter<UserPhotoAdapter.UserPhotoViewHolder> {

    private List<UserDetailImage> userImages;
    private Context context;


    public static class UserPhotoViewHolder extends RecyclerView.ViewHolder {
        ImageView imgUser;


        public UserPhotoViewHolder(View v) {
            super(v);
            imgUser = (ImageView) v.findViewById(R.id.imgUser);
        }
    }

    public UserPhotoAdapter(List<UserDetailImage> userImages, Context context) {
        this.userImages = userImages;
        this.context = context;
    }

    @Override
    public UserPhotoAdapter.UserPhotoViewHolder onCreateViewHolder(ViewGroup parent,
                                                                   int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.list_user_image, parent, false);
        return new UserPhotoViewHolder(view);
    }


    @Override
    public void onBindViewHolder(UserPhotoViewHolder holder, final int position) {
        String userImgUrl = "http://eadate.com/images/user/" + userImages.get(position).getImageUrl();
        Picasso.with(this.context).load(userImgUrl).into(holder.imgUser);
    }

    @Override
    public int getItemCount() {
        return userImages.size();
    }

}