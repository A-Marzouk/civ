export default {
  methods: {
    formatDuration(durationSeconds) {
      let seconds = Math.floor(durationSeconds % 60);

      if (seconds < 10) {
        seconds = '0' + seconds;
      }

      let minutes = Math.floor(durationSeconds / 60) % 60;

      if (minutes < 10) {
        minutes = '0' + minutes;
      }

      let hours = Math.floor(durationSeconds / 3600);

      return hours > 0 ? `${hours}:${minutes}:${seconds}` : `${minutes}:${seconds}`;
    },

    calculatePercentage(part, whole) {
      if (!part || !whole) {
        return 0;
      }

      return (part * 100) / whole;
    },

    calculatedAspectRatio(ratio = '0:0') {
      return ratio.split(':').reduce((a, b) => {
        return a / b;
      });
    },

    shorten(str, num = 24) {
      if (!str) return '';

      if (str.length > num) {
        return str.slice(0, num) + '...';
      }
      return str;
    },

    capitalize(str) {
      return str
        .split(' ')
        .map(substr => substr.charAt(0).toUpperCase() + substr.slice(1))
        .join(' ');
    }
  }
};
