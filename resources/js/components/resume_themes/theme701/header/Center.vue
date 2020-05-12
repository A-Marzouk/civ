<template>
  <div class="tm701-center">
    <div class="info">
      <h2 class="name">Christoher M. Wallacev</h2>
      <span class="profession">UX UI Designer</span>
    </div>
    <div class="skills">
      <ul>
        <li class="tw-mr-18px">
          <span>Adobe XD</span>
        </li>
        <li>
          <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="7" height="7" viewBox="0 0 7 7">
              <circle
                id="Ellipse_179"
                data-name="Ellipse 179"
                cx="3.5"
                cy="3.5"
                r="3.5"
                fill="#28404a"
              />
            </svg>
          </span>
          <span>Adobe Sketch</span>
        </li>
        <li>
          <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="7" height="7" viewBox="0 0 7 7">
              <circle
                id="Ellipse_179"
                data-name="Ellipse 179"
                cx="3.5"
                cy="3.5"
                r="3.5"
                fill="#28404a"
              />
            </svg>
          </span>
          <span>Figma</span>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style lang="scss">
.tm701-center {
  color: var(--blue-1);
  padding-left: 50px;
  .info {
    margin-bottom: 2rem;
    .name {
      font-size: 1.875rem;
      font-weight: 700;
      line-height: 2.5rem;
      margin-right: 19px;
    }
    .profession {
      font-size: 26px;
      font-weight: 400;
      line-height: 2.5rem;
    }
  }
  .skills {
    ul {
      display: flex;
      font-size: 26px;
      font-weight: 400;
      line-height: 2.5rem;
      li {
        &:first-child {
          margin-right: 18px;
        }
        &:not(:first-child) {
          display: flex;
          align-items: center;
          margin-right: 18px;
          span {
            &:first-child {
              margin-right: 14px;
            }
          }
        }
      }
    }
  }
}
</style>
