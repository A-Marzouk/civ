const mediaStore = {
  state: {
    playing: false,
    mediaItem: null,
    videoPlayer: null,
    videoPosition: null,
    videoDuration: null,
    audioPlayer: null,
    audioDuration: null,
    audioPosition: null
  },
  methods: {
    play(mediaItem) {
      if (!mediaStore.state.mediaItem || mediaItem.id !== mediaStore.state.mediaItem.id) {
        mediaStore.setters.mediaItem(mediaItem);
      }

      const players = {
        audio(src) {
          mediaStore.state.audioPlayer.src = src;
          mediaStore.state.audioPlayer.currentTime = mediaStore.state.audioPosition;
          mediaStore.state.audioPlayer.play().then(_ => {
            mediaStore.setters.audioDuration();
            mediaStore.setters.playing(true);
          });

          console.log('play audio: ', src);
        },
        video(src) {
          console.log('play video: ', src);
        }
      };
      players[mediaItem.type](mediaItem.url);
    },
    pause() {
      mediaStore.setters.playing(false);

      const players = {
        audio() {
          console.log('pause audio', mediaStore.state.audioPlayer);
          mediaStore.state.audioPlayer.pause();
        },
        video() {
          console.log('pause video');
        }
      };
      players[mediaStore.state.mediaItem.type]();
    }
  },
  setters: {
    playing(playing) {
      mediaStore.state.playing = playing;
    },
    audioDuration() {
      mediaStore.state.audioDuration = mediaStore.state.audioPlayer.duration;
    },
    audioPosition() {
      mediaStore.state.audioPosition = mediaStore.state.audioPlayer.currentTime;
    },
    resetAudioPosition() {
      mediaStore.state.playing = false;
      mediaStore.state.audioPosition = 0;
    },
    mediaItem(mediaItem) {
      mediaStore.state.mediaItem = mediaItem;
    },
    audioPlayer(player) {
      mediaStore.state.audioPlayer = player;
    }
  }
};

export default mediaStore;
