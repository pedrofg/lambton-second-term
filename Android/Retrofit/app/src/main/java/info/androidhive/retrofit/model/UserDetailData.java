package info.androidhive.retrofit.model;

import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

import java.util.List;

import io.realm.RealmList;
import io.realm.RealmObject;
import io.realm.annotations.Ignore;
import io.realm.annotations.PrimaryKey;

/**
 * Created by Pedro on 2017-12-10.
 */

public class UserDetailData extends RealmObject {

    @PrimaryKey
    @SerializedName("id")
    @Expose
    private String id;
    @SerializedName("main")
    @Expose
    private Main main;
    @SerializedName("statistics")
    @Expose
    private Statistics statistics;
    @SerializedName("image")
    @Expose
    private RealmList<UserDetailImage> image = null;
    @SerializedName("description")
    @Expose
    private RealmList<Description> description = null;
    @SerializedName("basic")
    @Expose
    private RealmList<Basic> basic = null;
    @SerializedName("match")
    @Expose
    private RealmList<Match> match = null;
    @SerializedName("gift")
    @Expose
    private RealmList<Gift> gift = null;
    @SerializedName("tag")
    @Expose
    private RealmList<UserDetailTag> tag = null;
    @Ignore
    @SerializedName("option")
    @Expose
    private List<Option> option = null;

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public Main getMain() {
        return main;
    }

    public void setMain(Main main) {
        this.main = main;
    }

    public Statistics getStatistics() {
        return statistics;
    }

    public void setStatistics(Statistics statistics) {
        this.statistics = statistics;
    }

    public List<UserDetailImage> getImage() {
        return image;
    }

    public void setImage(RealmList<UserDetailImage> image) {
        this.image = image;
    }

    public List<Description> getDescription() {
        return description;
    }

    public void setDescription(RealmList<Description> description) {
        this.description = description;
    }

    public List<Basic> getBasic() {
        return basic;
    }

    public void setBasic(RealmList<Basic> basic) {
        this.basic = basic;
    }

    public List<Match> getMatch() {
        return match;
    }

    public void setMatch(RealmList<Match> match) {
        this.match = match;
    }

    public List<Gift> getGift() {
        return gift;
    }

    public void setGift(RealmList<Gift> gift) {
        this.gift = gift;
    }

    public List<UserDetailTag> getTag() {
        return tag;
    }

    public void setTag(RealmList<UserDetailTag> tag) {
        this.tag = tag;
    }

    public List<Option> getOption() {
        return option;
    }

    public void setOption(List<Option> option) {
        this.option = option;
    }


}
