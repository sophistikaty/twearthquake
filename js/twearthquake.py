from tweepy import Stream
from tweepy import OAuthHandler
from tweepy.streaming import StreamListener
import time

ckey = 'BGLQnkFeXuY36oxIbTOdRkL26'
csecret = 'CZhChKAq6oJPp4w3eTpyTwoQ58y495GVq3nWb38SV6aiZlTSLb'
atoken = '180393015-rGtA7Vq5DaPc04gUYU1frMjX2KoYIOvxADk0FeJl'
asecret = 'dwzLh98pr0hZKnaml5d0cbbfIMvpRMQzNDpSNrBEgLTvY'

class listener(StreamListener):

	def on_data(self,data):
		print data
		#tweet = data.split(',"created_at":"')[1].split('","source')[0]
		#.split(',"text":"')[1].split(',"source":"')[0].split(',"location":"')[1].split(',"url":"')[0]
		#print tweet
		#saveThis = str(time.time())+'::'+tweet
		return True
	def on_error(self, status):
		print status

auth = OAuthHandler(ckey,csecret)
auth.set_access_token(atoken, asecret)
twitterStream = Stream (auth, listener())
twitterStream.filter(track=["earthquake, quake"])
