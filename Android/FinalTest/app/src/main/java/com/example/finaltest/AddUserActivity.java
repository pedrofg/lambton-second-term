package com.example.finaltest;

import android.support.annotation.IdRes;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.RadioGroup;
import android.widget.SeekBar;
import android.widget.Spinner;
import android.widget.TextView;

import java.util.Random;

public class AddUserActivity extends AppCompatActivity implements View.OnClickListener {

    private EditText edtName;
    private SeekBar skAge;
    private Spinner spMajor;
    private RadioGroup rbGender;
    private String age;
    private String gender;
    private Button btnSave;
    private TextView txtAgeValue;
    private User user;
    private ArrayAdapter<CharSequence> adapter;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_add_user);

        this.edtName = (EditText) findViewById(R.id.edtName);
        this.skAge = (SeekBar) findViewById(R.id.sbAge);
        this.spMajor = (Spinner) findViewById(R.id.spMajor);
        this.rbGender = (RadioGroup) findViewById(R.id.rbGender);
        this.txtAgeValue = (TextView) findViewById(R.id.txtAgeValue);
        this.btnSave = (Button) findViewById(R.id.btnSave);
        this.btnSave.setOnClickListener(this);
        adapter = ArrayAdapter.createFromResource(this, R.array.major_array, android.R.layout.simple_spinner_item);
        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);


        setListeners();

        if (getIntent().getExtras() != null)
            loadUser();

    }

    private void loadUser() {
        String userId = getIntent().getExtras().getString("userExtra");
        user = RealmController.with(this).getUser(userId);
        this.edtName.setText(user.getName());
        this.skAge.setProgress(Integer.valueOf(user.getAge()));
        this.rbGender.check(user.getGender().equals("Male") ? R.id.rbMale : R.id.rbFemale);

        int spinnerPosition = adapter.getPosition(user.getMajor());
        this.spMajor.setSelection(spinnerPosition);
    }

    private void setListeners() {

        this.skAge.setOnSeekBarChangeListener(new SeekBar.OnSeekBarChangeListener() {
            @Override
            public void onProgressChanged(SeekBar seekBar, int progress, boolean fromUser) {
                age = String.valueOf(progress);
                txtAgeValue.setText(age);
            }

            @Override
            public void onStartTrackingTouch(SeekBar seekBar) {

            }

            @Override
            public void onStopTrackingTouch(SeekBar seekBar) {

            }
        });


        this.rbGender.setOnCheckedChangeListener(new RadioGroup.OnCheckedChangeListener() {
            @Override
            public void onCheckedChanged(RadioGroup group, @IdRes int checkedId) {
                if (checkedId == R.id.rbMale) {
                    gender = "Male";
                } else {
                    gender = "Female";
                }
            }
        });


        this.spMajor.setAdapter(adapter);

    }

    @Override
    public void onClick(View v) {
        if (user == null) {
            user = new User();
            user.setName(edtName.getText().toString());
            user.setAge(age);
            user.setMajor(String.valueOf(spMajor.getSelectedItem()));
            user.setGender(gender);

            user.setId(random());

            RealmController.with(this).saveUser(user);
        } else {
            RealmController realm = RealmController.with(this);
            realm.getRealm().beginTransaction();

            user.setName(edtName.getText().toString());
            user.setAge(age);
            user.setMajor(String.valueOf(spMajor.getSelectedItem()));
            user.setGender(gender);

            realm.getRealm().commitTransaction();

        }

        finish();
        Log.d("test", "test");
    }

    public static String random() {
        Random generator = new Random();
        return String.valueOf(generator.nextInt());
    }
}
