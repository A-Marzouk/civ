export default {
    methods: {
		formatDuration(durationSeconds) {
			let seconds = Math.floor(durationSeconds % 60);

			if (seconds < 10) {
				seconds = "0" + seconds;
			}

			let minutes = Math.floor(durationSeconds / 60) % 60;

			if (minutes < 10) {
				minutes = "0" + minutes;
			}

			let hours = Math.floor(durationSeconds / 3600);

			return hours > 0
				? `${hours}:${minutes}:${seconds}`
				: `${minutes}:${seconds}`;
        },

        calculatePercentage(part, whole) {
            console.log(part, whole);
            console.log(part*100/whole);

            return part*100/whole;
        },

        calculatedAspectRatio(ratio = "0:0") {
			return ratio.split(":").reduce((a, b) => {
				return a / b;
			});
		},
	}
}