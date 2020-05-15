<template>
	<div class="portfolio-tab tw-w-full tw-flex tw-flex-wrap">
		<div v-for="(portfolio, index) in portfolios" :key="portfolio.id" class="portfolio-tab__project tw-w-1/3" :style="getItemStyle(index)">
			<div class="tw-relative" @click="showSelectedPortfolio(portfolio)">
				<div class="preview-icon tw-absolute tw-top-0 tw-right-0 tw-text-black">
					<svg viewBox="0 0 9 10" class="tw-fill-current" xmlns="http://www.w3.org/2000/svg">
						<path d="M5.8607 0.989014L6.8956 2.02392L5.59522 3.3153L6.23416 3.95425L7.52555 2.65386L8.56045 3.68877V0.989014H5.8607ZM0.461182 3.68877L1.49609 2.65386L2.78747 3.95425L3.42642 3.3153L2.12603 2.02392L3.16094 0.989014H0.461182V3.68877ZM3.16094 9.08829L2.12603 8.05338L3.42642 6.762L2.78747 6.12305L1.49609 7.42344L0.461182 6.38853V9.08829H3.16094ZM8.56045 6.38853L7.52555 7.42344L6.23416 6.12305L5.59522 6.762L6.8956 8.05338L5.8607 9.08829H8.56045V6.38853Z" />
					</svg>
				</div>
				<img :src="portfolio.url" class="project__thumbnail tw-w-full">
			</div>
		</div>

		<ImagePreview :url="selectedPortfolio.url" :isOpen="selectedPortfolio.isOpen" @onClose="hideSelectedPortfolio" />
	</div>
</template>

<script>
import ImagePreview from "./../components/portfolio/ImagePreview";

export default {
	name: "portfolio",

	components: { ImagePreview },

	data: () => {
		return {
			portfolios: [
				{
					id: 1,
					url: "/images/resume_themes/theme1000/portfolio/1.png"
				},
				{
					id: 2,
					url: "/images/resume_themes/theme1000/portfolio/2.png"
				},
				{
					id: 3,
					url: "/images/resume_themes/theme1000/portfolio/3.png"
				},
				{
					id: 4,
					url: "/images/resume_themes/theme1000/portfolio/4.png"
				},
				{
					id: 5,
					url: "/images/resume_themes/theme1000/portfolio/5.png"
				},
				{
					id: 6,
					url: "/images/resume_themes/theme1000/portfolio/6.png"
				},
				{
					id: 7,
					url: "/images/resume_themes/theme1000/portfolio/1.png"
				},
				{
					id: 8,
					url: "/images/resume_themes/theme1000/portfolio/2.png"
				},
				{
					id: 9,
					url: "/images/resume_themes/theme1000/portfolio/3.png"
				},
				{
					id: 10,
					url: "/images/resume_themes/theme1000/portfolio/4.png"
				},
				{
					id: 11,
					url: "/images/resume_themes/theme1000/portfolio/5.png"
				},
				{
					id: 12,
					url: "/images/resume_themes/theme1000/portfolio/6.png"
				}
			],
			selectedPortfolio: {
				url: "",
				isOpen: false
			},
			gridAreaValues: [],
			windowWidth: window.innerWidth
		};
	},

	computed: {
		getItemStyle() {
			return index => {
				if (this.gridAreaValues.length == 0) {
					return "";
				}

				if (this.windowWidth < 768) {
					return "";
				}

				let [
					startRow,
					startColumn,
					endRow,
					endColumn
				] = this.gridAreaValues[index];

				return `grid-area: ${startRow} / ${startColumn} / ${endRow} / ${endColumn};`;
			};
		}
	},

	methods: {
		showSelectedPortfolio(portfolio) {
			this.selectedPortfolio = { url: portfolio.url, isOpen: true };
			document.body.classList.add("tw-overflow-hidden");
		},

		hideSelectedPortfolio() {
			this.selectedPortfolio = { url: "", isOpen: false };
			document.body.classList.remove("tw-overflow-hidden");
		},

		initGridAreas() {
			let currentColumn = 0,
				columns = [
					[1, 3],
					[3, 4],
					[4, 5],
					[3, 4],
					[4, 5],
					[5, 7]
				],
				currentRow = 0,
				rows = [
					[1, 3],
					[1, 2],
					[1, 2],
					[2, 3],
					[2, 3],
					[1, 3]
				];

			this.gridAreaValues = this.portfolios.map((item, index) => {
				if (index % 6 === 0) {
					currentColumn = 0;
					currentRow = 0;

					rows = rows.map(row => {
						return [row[0] + 2, row[1] + 2];
					});
				} else {
					currentColumn++;
					currentRow++;
				}

				return [
					rows[currentRow][0],
					columns[currentColumn][0],
					rows[currentRow][1],
					columns[currentColumn][1]
				];
			});
		}
	},

	mounted() {
		this.initGridAreas();
		window.onresize = e => (this.windowWidth = e.target.innerWidth);
	}
};
</script>

<style lang="scss" scoped>
@import "./../scss/variables";

.portfolio-tab {
	padding: 17px;
}

.portfolio-tab__project {
	padding: 9px;
}

.project__thumbnail {
	border-radius: 10px;
}

.preview-icon {
	padding-top: 10px;
	padding-right: 10px;

	svg {
		width: 9px;
		height: 10px;
	}
}

@media (min-width: $sm) {
	.preview-icon {
		padding-top: 15px;
		padding-right: 15px;

		svg {
			width: 22px;
			height: 22px;
		}
	}
}

@media (min-width: $md) {
	.portfolio-tab {
		padding: 27px;
	}
}

@media (min-width: $lg) {
	.portfolio-tab {
		display: grid;
		grid-template-columns: repeat(6, minmax(0, 1fr));
		gap: 1rem;
	}

	.portfolio-tab__project {
		padding: 0;
		width: auto;
	}
}
</style>
