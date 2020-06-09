<template>
<v-card width="100%" height="130" class="audio-tm903" color="#fff" >
	<v-list-item>
		<v-list-item-avatar 
            height="65"
            width="65" 
            color="transparent">
			<v-img :src="img" ></v-img>
		</v-list-item-avatar>
		<v-list-item-content>
            <v-bottom-sheet  inset>
				<template v-slot:activator="{ on }">
			<v-list-item-title v-on="on" class="title-audio-tm903">AUD2020</v-list-item-title>
			<v-list-item-subtitle  v-on="on" class="subtitle-audio-tm903" >Hean Prinsloo</v-list-item-subtitle>
			<span v-on="on" class="timer-audio-tm903" >{{ currentTime }}</span>
					<v-btn
                        :color="color"
                        height="65"
                        width="65"
                        dark
                        absolute
                        right
                        fab
                        @click.native="playing ? pause() : play()"
                    >
						<v-icon color="#FFD43B" large v-if="!playing || paused">mdi-play</v-icon>
						<v-icon color="#FFD43B" large v-else>mdi-pause</v-icon>
					</v-btn>
				</template>
				<v-card tile>
					<v-list>
						<v-list-item>
                        <v-row justify="center" class="align-center" >
                            <v-col cols="3" >
                                <v-row justify="center" class="align-center" >
                                <v-col cols="4" >
                                    <v-list-item-avatar 
                                        height="65"
                                        width="65" 
                                        color="transparent">
                                        <v-img :src="img" ></v-img>
                                    </v-list-item-avatar>
                                </v-col>
                                <v-col  >
                                    <div class="audio-info-903" >
                                        <span class="title-audio-tm903" >AUD2020</span>
                                        <br>
                                        <span class="subtitle-audio-tm903" >Hean Prinsloo</span>
                                    </div>
                                </v-col>
                                </v-row>
                            </v-col>
                            <v-col>
                                    <div class="ml-n12" >
                                        <v-progress-linear
                                            height="54"
                                            color="#FFD43B"
                                            rounded
                                            style="cursor:pointer;border-radius: 30px;"
                                            @click.native="setPosition()" :disabled="!loaded"
                                            v-model="percentage"
                                            >
                                            <v-img class="ml-6 mt-6 mb-6 mr-6" src="/images/theme903/Bars.png" ></v-img>
                                        </v-progress-linear>
                                    </div>
                            </v-col>
                            <v-col>
                                <div class="d-flex" >
                                        <v-list-item-icon>
                                            <v-btn icon>
                                                <v-icon  >mdi-shuffle</v-icon>
                                            </v-btn>
                                        </v-list-item-icon>
                                        <div class="player-audio-tm903"  >
                                            <v-btn style="margin-left:auto;margin-right:auto;" height="60" width="60" color="#0D001A" fab>
                                                <v-icon color="#FFFFFF" >mdi-chevron-double-left</v-icon>
                                            </v-btn>
                                            <v-btn @click.native="playing ? pause() : play()"  style="margin-left:auto;margin-right:auto;" height="60" width="60" color="#FFD43B" fab>
                                                <v-icon v-if="!playing || paused">mdi-play</v-icon>
						                        <v-icon v-else>mdi-pause</v-icon>
                                            </v-btn>
                                            <v-btn style="margin-left:auto;margin-right:auto;"  height="60" width="60"  color="#0D001A" fab>
                                                <v-icon color="#FFFFFF" >mdi-chevron-double-right</v-icon>
                                            </v-btn>
                                        </div>
                                        <v-list-item-icon>
                                            <v-btn @click.native="reload()" icon>
                                                <v-icon  >mdi-repeat</v-icon>
                                            </v-btn>
                                        </v-list-item-icon>
                                </div>
                            </v-col>
                        </v-row>
                                <v-spacer></v-spacer>
                                <v-btn icon>
                                    <v-icon >mdi-fullscreen</v-icon>
                                </v-btn>
                            </v-list-item>
						</v-list>
					</v-card>
				</v-bottom-sheet>
				<audio id="player" ref="player" v-on:ended="ended" v-on:canplay="canPlay" :src="file"></audio>
			</v-list-item-content>
		</v-list-item>
		<v-row class="mt-n5 pl-4 pr-4" justify="center" >
			<v-col >
				<v-progress-linear rounded color="#FFD43B" v-model="percentage" height="8" style="cursor:pointer;margin-top: 15px; margin-bottom: 15px;" @click.native="setPosition()" :disabled="!loaded"></v-progress-linear>
			</v-col>
		</v-row>
	</v-card>
</template>
<script>
    const formatTime = second => new Date(second * 1000).toISOString().substr(11, 8);
    export default {
        name: 'vuetify-audio',
        props: {
            file: {
                type: String,
                default: null
            },
            img: {
                type: String,
                default: null
            },
            autoPlay: {
                type: Boolean,
                default: false
            },
            ended: {
                type: Function,
                default: () => {},
            },
            canPlay: {
                type: Function,
                default: () => {},
            },
            color: {
                type: String,
                default: null
            },
            downloadable: {
                type: Boolean,
                default: false
            }
        },
        computed: {
            duration: function () {
                return this.audio ? formatTime(this.totalDuration) : ''
            },
        play_margin() {
            switch (this.$vuetify.breakpoint.name) {
            case 'xs': return 'ma-1'
            case 'sm': return 'ma-5'
            case 'md': return 'ma-5'
            case 'lg': return 'ma-5'
            case 'xl': return 'ma-5'
            }
        }
        },
        data () {
            return {
                firstPlay: true,
                isMuted: false,
                loaded: false,
                playing: false,
                paused: false,
                percentage: 0,
                currentTime: '00:00:00',
                audio: undefined,
                totalDuration: 0,
            }
        },
        methods: {
            setPosition () {
                this.audio.currentTime = parseInt(this.audio.duration / 100 * this.percentage);
            },
            stop () {
                this.audio.pause()
                this.paused = true
                this.playing = false
                this.audio.currentTime = 0
            },
            play () {
                if (this.playing) return
                this.audio.play().then(_ => this.playing = true)
                this.paused = false
            },
            pause () {
                this.paused = !this.paused;
                (this.paused) ? this.audio.pause() : this.audio.play()
            },
            download () {
                this.audio.pause()
                window.open(this.file, 'download')
            },
            mute () {
                this.isMuted = !this.isMuted
                this.audio.muted = this.isMuted
                this.volumeValue = this.isMuted ? 0 : 75
            },
            reload () {
                this.audio.pause()
                this.audio.currentTime = 0
                this.audio.load();
                this.audio.play()
            },
            _handleLoaded: function () {
                if (this.audio.readyState >= 2) {
                    if (this.audio.duration === Infinity) {
                        // Fix duration for streamed audio source or blob based
                        // https://stackoverflow.com/questions/38443084/how-can-i-add-predefined-length-to-audio-recorded-from-mediarecorder-in-chrome/39971175#39971175
                        this.audio.currentTime = 1e101;
                        this.audio.ontimeupdate = () => {
                            this.audio.ontimeupdate = () => {}
                            this.audio.currentTime = 0
                            this.totalDuration = parseInt(this.audio.duration)
                            this.loaded = true;
                        }
                    } else {
                        this.totalDuration = parseInt(this.audio.duration)
                        this.loaded = true
                    }
                    if (this.autoPlay) this.audio.play()
                } else {
                    throw new Error('Failed to load sound file')
                }
            },
            _handlePlayingUI: function (e) {
                this.percentage = this.audio.currentTime / this.audio.duration * 100
                this.currentTime = formatTime(this.audio.currentTime)
                this.playing = true
            },
            _handlePlayPause: function (e) {
                if (e.type === 'play' && this.firstPlay) {
                    // in some situations, audio.currentTime is the end one on chrome
                    this.audio.currentTime = 0;
                    if (this.firstPlay) {
                        this.firstPlay = false;
                    }
                }
                if (e.type === 'pause' && this.paused === false && this.playing === false) {
                    this.currentTime = '00:00:00'
                }
            },
            _handleEnded () {
                this.paused = this.playing = false;
            },
            init: function () {
                this.audio.addEventListener('timeupdate', this._handlePlayingUI);
                this.audio.addEventListener('loadeddata', this._handleLoaded);
                this.audio.addEventListener('pause', this._handlePlayPause);
                this.audio.addEventListener('play', this._handlePlayPause);
                this.audio.addEventListener('ended', this._handleEnded);
            },
        },
        mounted () {
            this.audio = this.$refs.player;
            this.init();
        },
        beforeDestroy () {
            this.audio.removeEventListener('timeupdate', this._handlePlayingUI)
            this.audio.removeEventListener('loadeddata', this._handleLoaded)
            this.audio.removeEventListener('pause', this._handlePlayPause)
            this.audio.removeEventListener('play', this._handlePlayPause)
            this.audio.removeEventListener('ended', this._handleEnded);
        }
    }
</script>
<style lang="scss">
.player-audio-tm903{
    background: #0D001A;
    box-shadow: -5px -5px 9px rgba(113, 113, 113, 0.149);
    border-radius: 30px;
    width: 235px;
    height: 60px;
    display: flex;
}
.title-audio-tm903{
font-family: Poppins;
font-style: normal;
font-weight: bold;
font-size: 18px;
line-height: 27px;
color: #000000;
cursor: pointer;
}
.subtitle-audio-tm903{
    font-family: Poppins;
    text-transform: capitalize;
    font-style: normal;
    font-weight: normal;
    font-size: 12px;
    line-height: 18px;
    color: rgba(0, 0, 0, 0.55);
    cursor: pointer;
}
.v-card:not(.v-sheet--tile):not(.v-card--shaped) {
    border-radius: 20px;
}
.v-bottom-sheet.v-dialog.v-bottom-sheet--inset {
    max-width: 100%;
}

.audio-tm903{
box-shadow: 0px 6px 6px rgba(0, 0, 0, 0.1);
border-radius: 20px;
            .v-progress-linear--rounded {
                border-radius: 20px;
            }
.v-progress-linear__background{
                background-color:#0D001A !important;
                opacity: 1 !important;
            }
.bottom-audio-tm903{
    max-width: 20px;
}

.timer-audio-tm903{
    font-family: Poppins;
    font-style: normal;
    font-weight: normal;
    font-size: 12px;
    line-height: 18px;
    color: #000000;
    cursor: pointer;
}
    .conter-tm901{
        font-family: Open Sans;
    font-style: normal;
    font-weight: 300;
    font-size: 21px;
    line-height: 29px;
    color: #5289E7;
    }
}
</style>