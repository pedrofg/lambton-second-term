package info.androidhive.retrofit.adapter;

import android.content.Context;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;

import com.squareup.picasso.Picasso;

import java.util.List;

import info.androidhive.retrofit.R;
import info.androidhive.retrofit.model.UserInfo;

/**
 * Created by macstudent on 2017-12-04.
 */

public class UserInfoAdapter extends RecyclerView.Adapter<UserInfoAdapter.UserInfoViewHolder> {

    private List<UserInfo> userInfos;
    private int rowLayout;
    private Context context;
    private OnUserItemClicked onUserItemClicked;


    public static class UserInfoViewHolder extends RecyclerView.ViewHolder {
        LinearLayout UserInfosLayout;
        TextView UserInfoTitle;
        TextView data;
        TextView UserInfoDescription;
        TextView rating;
        ImageView imageView;


        public UserInfoViewHolder(View v) {
            super(v);
            UserInfosLayout = (LinearLayout) v.findViewById(R.id.movies_layout);
            imageView = (ImageView)  v.findViewById(R.id.mainImage);
            UserInfoTitle = (TextView) v.findViewById(R.id.title);
            data = (TextView) v.findViewById(R.id.subtitle);
            UserInfoDescription = (TextView) v.findViewById(R.id.description);
            rating = (TextView) v.findViewById(R.id.description2);
        }
    }

    public UserInfoAdapter(List<UserInfo> userInfos, int rowLayout, Context context, OnUserItemClicked onUserItemClicked) {
        this.userInfos = userInfos;
        this.rowLayout = rowLayout;
        this.context = context;
        this.onUserItemClicked = onUserItemClicked;
    }

    @Override
    public UserInfoAdapter.UserInfoViewHolder onCreateViewHolder(ViewGroup parent,
                                                            int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(rowLayout, parent, false);
        return new UserInfoViewHolder(view);
    }


    @Override
    public void onBindViewHolder(UserInfoViewHolder holder, final int position) {
        holder.UserInfoTitle.setText(userInfos.get(position).getDisplayName());
        holder.data.setText(userInfos.get(position).getSignature());
        holder.UserInfoDescription.setText(userInfos.get(position).getCity());
        holder.rating.setText(userInfos.get(position).getBirthday() );

        String url = "http://eadate.com/images/user/"+ userInfos.get(position).getMainImage();
        Picasso.with(context).load(url).into(holder.imageView  );

        holder.itemView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                onUserItemClicked.onUserItemClicked(userInfos.get(position));
            }
        });
    }

    @Override
    public int getItemCount() {
        return userInfos.size();
    }

    public interface OnUserItemClicked {
        void onUserItemClicked(UserInfo user);

    }
}