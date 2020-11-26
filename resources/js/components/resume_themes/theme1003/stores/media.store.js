export default {
  current: null,
  mediaItems: [],
  audioPlayer: null,
  videoPlayer: null,
  playAudio(audio) {
    if (this.current && this.current.isPlaying) {
      this.current.isPlaying = false;
    }

    this.current = audio;
    this.audioPlayer.src = audio.url;
    this.audioPlayer.currentTime = audio.position;
    this.current.duration = this.audioPlayer.duration;

    this.audioPlayer.play().then(_ => {
      this.current.isPlaying = true;
    });
  },
  pauseAudio() {
    this.current.isPlaying = false;
    this.audioPlayer.pause();
  },
  playVideo(video) {
    if (this.current && this.current.isPlaying) {
      this.current.isPlaying = false;
    }

    this.current = video;
  },
  pauseVideo() {
    this.current.isPlaying = false;
    this.current = null;
  },
  setMediaItems(mediaItems) {
    this.mediaItems = mediaItems.map((mediaItem, index) => {
      return { index, ...mediaItem, isPlaying: false, position: 0, duration: 0 };
    });
  },
  setupAudioPlayer() {
    const audioPlayer = new Audio();

    audioPlayer.onloadedmetadata = () => {
      this.current.duration = audioPlayer.duration;
    };

    audioPlayer.ontimeupdate = () => {
      this.current.position = audioPlayer.currentTime;
    };

    audioPlayer.onended = () => {
      this.current.position = audioPlayer.currentTime;
    };

    this.audioPlayer = audioPlayer;
  },
  init(mediaItems) {
    this.setupAudioPlayer();
    this.setMediaItems(mediaItems);
  }
};
