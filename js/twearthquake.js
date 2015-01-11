$(document).ready(function(){

	function loadJson() {
		$.getJSON('/Users/kaitlynnhendricks/Dropbox/kh current FAA files/kh personal/twearthquake/js/twearthquake-output.json',
	 	function(tweets) {
	 	console.log(tweets);
		// var feedHTML = '';
		
		// for (var i=0; i < tweets.length; i++) {
		// 	// var tweetscreenname = feeds[i].user.name;
	 //                // var created_at = feeds[i].created_at;
	 //                // var id = feeds[i].idNo;
	 //                console.log('created_at');
		//  }
		});	
		document.getElementById("tweetMap").innerHTML=tweets;
	}

	loadJson();	
});


//     //since my Json statement works, I should be able to use the following argument to create a HTML row
//     $('<tr><td>Parameter 2</td><td>&nbsp</td><td>out_json</td>').appendTo('.app')   



		
		// var output="<ul>";
		// for (var i in tweets.relevantTweets) {
		// 	output+="<li>" + tweets.relevantTweets[i].coordinates+ " " +tweets.relevantTweets[i].place+ " " +tweets.relevantTweets[i].created_at+ " " +tweets.relevantTweets[i].id_str+ " " +tweets.relevantTweets[i].profile_image_url+ " " +tweets.relevantTweets[i].text+"</li>";
		// }
	// output+="</ul>";
	// document.getElementById("tweetMap").innerHTML=output;
	// });

// var tweets={"relevantTweets":[ 
	
// 	{
// 		"hashtags":  "[#earthquake]",
// 	    "result_type": "recent",
// 	    "protected": false,
// 		"created_at": "Mon Aug 25 22:25:36 +0000 2014",
// 		"geo_enabled": true,
// 		"geo": null,
// 	    "coordinates": null,
// 	    "place": null,
// 	    "time_zone": "Eastern Time (US & Canada)",
// 	    "is_translation_enabled": true,
// 	    "id": 504031869243908096,
// 	    "id_str": "504031869243908096",
// 	    "profile_image_url": "http://pbs.twimg.com/profile_images/2416761735/s1si8rhaiuoss2stjayy_normal.jpeg",
// 	    "text": "6 Earthquake Preparedness Tips for Business Owners: Everything you need to know to protect yourself, your empl... http://t.co/kZQmojfUwl"
// 	},
// 	{
// 		"hashtags":  "[#quake]",
// 	    "result_type": "recent",
// 	    "protected": false,
// 		"created_at": "Tues Aug 26 22:25:36 +0000 2014",
// 		"geo_enabled": true,
// 		"geo": null,
// 	    "coordinates": null,
// 	    "place": null,
// 	    "time_zone": "Eastern Time (US & Canada)",
// 	    "is_translation_enabled": true,
// 	    "id": 504031869243908096,
// 	    "id_str": "555031869243908555",
// 	    "profile_image_url": "http://pbs.twimg.com/profile_images/2416761735/s1si8rhaiuoss2stjayy_normal.jpeg",
// 	    "text": "555 Earthquake Preparedness Tips for Business Owners: Everything you need to know to protect yourself, your empl... http://t.co/kZQmojfUwl"
// 	}
// }

    // document.getElementById("tweetMap").innerHTML=tweet.relevantTweets[0].coordinates+ " " +tweet.relevantTweets[0].place+ " " +tweet.relevantTweets[0].created_at+ " " +tweet.relevantTweets[0].id_str+ " " +tweet.relevantTweets[0].profile_image_url+ " " +tweet.relevantTweets[0].text;


