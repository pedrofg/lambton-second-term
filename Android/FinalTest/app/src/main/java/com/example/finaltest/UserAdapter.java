package com.example.finaltest;

import android.content.Context;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.TextView;

import java.util.List;

/**
 * Created by macstudent on 2017-12-13.
 */

public class UserAdapter extends RecyclerView.Adapter<UserAdapter.UserViewHolder> {

    private List<User> userList;
    private Context context;
    private OnUserItemClicked onClickListener;


    public static class UserViewHolder extends RecyclerView.ViewHolder {
        TextView txtName;
        TextView txtAge;
        TextView txtGender;
        TextView txtMajor;
        Button btnRemove;


        public UserViewHolder(View v) {
            super(v);
            txtName = (TextView) v.findViewById(R.id.txtName);
            txtAge = (TextView) v.findViewById(R.id.txtAge);
            txtGender = (TextView) v.findViewById(R.id.txtGender);
            txtMajor = (TextView) v.findViewById(R.id.txtMajor);
            btnRemove = (Button) v.findViewById(R.id.btnRemove);
        }
    }

    public UserAdapter(List<User> userList, Context context, OnUserItemClicked clickListener) {
        this.userList = userList;
        this.context = context;
        this.onClickListener = clickListener;
    }

    @Override
    public UserAdapter.UserViewHolder onCreateViewHolder(ViewGroup parent,
                                                                   int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.list_user_basic, parent, false);
        return new UserViewHolder(view);
    }


    @Override
    public void onBindViewHolder(UserViewHolder holder, final int position) {
        final User user = userList.get(position);
        holder.txtName.setText("Name: " + user.getName());
        holder.txtAge.setText("Age: " + user.getAge());
        holder.txtGender.setText("Gender: " + user.getGender());
        holder.txtMajor.setText("Major: " + user.getMajor());
        holder.itemView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                onClickListener.onUserItemClicked(user);
            }
        });

        holder.btnRemove.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                onClickListener.onRemoveUser(user);
            }
        });

    }

    @Override
    public int getItemCount() {
        return userList.size();
    }

    public interface OnUserItemClicked {
        void onUserItemClicked(User user);
        void onRemoveUser(User user);

    }

}