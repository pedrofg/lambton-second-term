package info.androidhive.retrofit.adapter;

import android.content.Context;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import java.util.List;

import info.androidhive.retrofit.R;
import info.androidhive.retrofit.model.Basic;

/**
 * Created by macstudent on 2017-12-04.
 */

public class UserBasicAdapter extends RecyclerView.Adapter<UserBasicAdapter.UserBasicViewHolder> {

    private List<Basic> userBasics;
    private Context context;


    public static class UserBasicViewHolder extends RecyclerView.ViewHolder {
        TextView txtBasicName;
        TextView txtBasicValue;


        public UserBasicViewHolder(View v) {
            super(v);
            txtBasicName = (TextView) v.findViewById(R.id.txtBasicName);
            txtBasicValue = (TextView) v.findViewById(R.id.txtBasicValue);
        }
    }

    public UserBasicAdapter(List<Basic> userBasics, Context context) {
        this.userBasics = userBasics;
        this.context = context;
    }

    @Override
    public UserBasicAdapter.UserBasicViewHolder onCreateViewHolder(ViewGroup parent,
                                                                   int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.list_user_basic, parent, false);
        return new UserBasicViewHolder(view);
    }


    @Override
    public void onBindViewHolder(UserBasicViewHolder holder, final int position) {
        holder.txtBasicName.setText(userBasics.get(position).getTitle() + ":");
        holder.txtBasicValue.setText(userBasics.get(position).getContent());
    }

    @Override
    public int getItemCount() {
        return userBasics.size();
    }

}