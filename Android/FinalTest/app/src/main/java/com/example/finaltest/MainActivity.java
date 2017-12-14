package com.example.finaltest;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Toast;


public class MainActivity extends AppCompatActivity implements UserAdapter.OnUserItemClicked {

    private RecyclerView recyclerView;
    private Toolbar toolbar;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        this.recyclerView = (RecyclerView) findViewById(R.id.rv_user);
        this.recyclerView.setLayoutManager(new LinearLayoutManager(this));


        // Attaching the layout to the toolbar object
        toolbar = (Toolbar) findViewById(R.id.tool_bar);
        // Setting toolbar as the ActionBar with setSupportActionBar() call
        setSupportActionBar(toolbar);
    }

    @Override
    protected void onResume() {
        super.onResume();

        this.recyclerView.setAdapter(new UserAdapter(RealmController.with(this).getUsers(), getApplicationContext(), this));
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menus, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_add) {
            Intent intent = new Intent(this, AddUserActivity.class);
            startActivity(intent);
        }

        return super.onOptionsItemSelected(item);
    }


    @Override
    public void onUserItemClicked(User user) {
        Intent intent = new Intent(this, AddUserActivity.class);
        String id = user.getId();
        intent.putExtra("userExtra", id);
        startActivity(intent);
    }

    @Override
    public void onRemoveUser(User user) {
        String name = user.getName();
        RealmController.with(this).removeUser(user);
        this.recyclerView.setAdapter(new UserAdapter(RealmController.with(this).getUsers(), getApplicationContext(), this));
        Toast.makeText(this, "User " + name + " removed succesfuly", Toast.LENGTH_SHORT).show();
    }
}
