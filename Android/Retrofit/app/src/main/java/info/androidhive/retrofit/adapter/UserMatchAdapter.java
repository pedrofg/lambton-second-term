package info.androidhive.retrofit.adapter;

import android.content.Context;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import java.util.List;

import info.androidhive.retrofit.R;
import info.androidhive.retrofit.model.Match;

/**
 * Created by macstudent on 2017-12-04.
 */

public class UserMatchAdapter extends RecyclerView.Adapter<UserMatchAdapter.UserMatchViewHolder> {

    private List<Match> userMatch;
    private Context context;


    public static class UserMatchViewHolder extends RecyclerView.ViewHolder {
        TextView txtBasicName;
        TextView txtBasicValue;


        public UserMatchViewHolder(View v) {
            super(v);
            txtBasicName = (TextView) v.findViewById(R.id.txtBasicName);
            txtBasicValue = (TextView) v.findViewById(R.id.txtBasicValue);
        }
    }

    public UserMatchAdapter(List<Match> userMatch, Context context) {
        this.userMatch = userMatch;
        this.context = context;
    }

    @Override
    public UserMatchAdapter.UserMatchViewHolder onCreateViewHolder(ViewGroup parent,
                                                                   int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.list_user_basic, parent, false);
        return new UserMatchViewHolder(view);
    }


    @Override
    public void onBindViewHolder(UserMatchViewHolder holder, final int position) {
        holder.txtBasicName.setText(userMatch.get(position).getTitle() + ":");
        holder.txtBasicValue.setText(userMatch.get(position).getContent());
    }

    @Override
    public int getItemCount() {
        return userMatch.size();
    }

}