package info.androidhive.retrofit.adapter;

import android.content.Context;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import java.util.List;

import info.androidhive.retrofit.R;
import info.androidhive.retrofit.model.Description;

/**
 * Created by macstudent on 2017-12-04.
 */

public class UserDescAdapter extends RecyclerView.Adapter<UserDescAdapter.UserDescViewHolder> {

    private List<Description> userDescs;
    private Context context;


    public static class UserDescViewHolder extends RecyclerView.ViewHolder {
        TextView txtDescTitle;
        TextView txtDescValue;


        public UserDescViewHolder(View v) {
            super(v);
            txtDescTitle = (TextView) v.findViewById(R.id.txtDescTitle);
            txtDescValue = (TextView) v.findViewById(R.id.txtDescValue);
        }
    }

    public UserDescAdapter(List<Description> userBasics, Context context) {
        this.userDescs = userBasics;
        this.context = context;
    }

    @Override
    public UserDescAdapter.UserDescViewHolder onCreateViewHolder(ViewGroup parent,
                                                                 int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.list_user_desc, parent, false);
        return new UserDescViewHolder(view);
    }


    @Override
    public void onBindViewHolder(UserDescViewHolder holder, final int position) {
        holder.txtDescTitle.setText(userDescs.get(position).getTitle());
        holder.txtDescValue.setText(userDescs.get(position).getContent());
    }

    @Override
    public int getItemCount() {
        return userDescs.size();
    }

}