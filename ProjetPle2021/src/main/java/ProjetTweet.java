import java.io.IOException;
import org.apache.hadoop.conf.Configuration;
import org.apache.hadoop.fs.Path;
import org.apache.hadoop.io.IntWritable;
import org.apache.hadoop.io.NullWritable;
import org.apache.hadoop.io.Text;
import org.apache.hadoop.mapreduce.Job;
import org.apache.hadoop.mapreduce.Mapper;
import org.apache.hadoop.mapreduce.Reducer;
import org.apache.hadoop.mapreduce.lib.input.FileInputFormat;
import org.apache.hadoop.mapreduce.lib.output.FileOutputFormat;
import org.apache.hadoop.mapreduce.lib.input.TextInputFormat;
import org.apache.hadoop.mapreduce.lib.output.TextOutputFormat;
import org.apache.hadoop.mapreduce.lib.output.SequenceFileOutputFormat;
import org.apache.hadoop.mapreduce.lib.input.SequenceFileInputFormat;
import org.json.*;

public class ProjetTweet {
  public static class ProjetTweetMapper extends Mapper<Object, Text, NullWritable, Text> {

    @Override
    public void map(Object key, Text value, Context context) throws IOException, InterruptedException {
      String strValue = value.toString();
      if (strValue.contains("delete"))
        return;
      JSONObject json = new JSONObject(strValue);
      String str = "{";
      final String tabKeys[] = { "created_at", "id", "text", "geo", "place", "retweet_count", "favorite_count" };
      final String tabKeys2[] = { "user", "id", "screen_name", "description", "followers_count", "friends_count",
          "created_at", "lang" };
      final String tabKeys3[] = { "entities", "hashtags", "user_mentions" };
      final String[] tab[] = { tabKeys2, tabKeys3 };
      for (int i = 0; i < tabKeys.length - 1; i = i + 1) {
        str += tabKeys[i] + ":" + json.get(tabKeys[i]).toString() + ",";
      }

      str += tabKeys[tabKeys.length - 1] + ": " + json.get(tabKeys[tabKeys.length - 1]).toString() + "}";

      for (int i = 0; i < tab.length; i = i + 1) {
        str += tab[i][0] + ":{";
        for (int j = 1; j < tab[i].length; j = j + 1) {

          str += tab[i][j] + ":" + json.getJSONObject(tab[i][0]).get(tab[i][j]).toString() + ",";
        }

      }
      str = str.substring(0, str.length() - 1);
      str += "}";
      Text word = new Text();
      word.set(str);
      context.write(NullWritable.get(), word);

    }

  }

  public static class ProjetTweetReducer extends Reducer<NullWritable, Text, Text, IntWritable> {
    public void reduce(Text key, Iterable<IntWritable> values, Context context)
        throws IOException, InterruptedException {
      // context.write(key, one);

    }

  }

  public static void main(String[] args) throws Exception {
    Configuration conf = new Configuration();
    Job job = Job.getInstance(conf, "ProjetTweet");
    job.setNumReduceTasks(0);
    job.setJarByClass(ProjetTweet.class);
    job.setMapperClass(ProjetTweetMapper.class);
    job.setMapOutputKeyClass(NullWritable.class);
    job.setMapOutputValueClass(Text.class);
    job.setReducerClass(ProjetTweetReducer.class);
    job.setOutputKeyClass(NullWritable.class);
    job.setOutputValueClass(Text.class);
    job.setOutputFormatClass(TextOutputFormat.class);
    // job.setOutputFormatClass(SequenceFileOutputFormat.class);

    job.setInputFormatClass(TextInputFormat.class);
    // job.setInputFormatClass(SequenceFileInputFormat.class);

    FileInputFormat.addInputPath(job, new Path(args[0]));
    FileOutputFormat.setOutputPath(job, new Path(args[1]));
    System.exit(job.waitForCompletion(true) ? 0 : 1);
  }
}
