const puppeteer = require('puppeteer')
const fs = require('fs')
const path = require('path')

const { selector } = require('./config')
// const cookies = require('./cookie')

let cookieJson = fs.readFileSync('cookies.json')
let cookies = JSON.parse(cookieJson)

let link = 'https://www.linkedin.com/in/rajes-waran-a564951a7/' //Add linkedin profile url before running getLinkedin function

const getLinkedin = async () => {
    try {

        const browser = await puppeteer.launch({
            headless: false,
        })

        const page = await browser.newPage();
        await page.setViewport({
            width: 1280,
            height: 800
        })

        const client = await page.target().createCDPSession()
        await client.send('Page.setDownloadBehavior', {
            behavior: 'allow',
            downloadPath: path.resolve(__dirname, 'download')
        })

        await page.setCookie(...cookies)
        await page.goto(link, {
            waitUntil: 'networkidle2'
        })

        await page.waitForSelector(selector.moreOption)
        await page.click(selector.moreOption)

        await page.waitFor(1500)

        await page.waitForSelector(selector.download)
        await page.click(selector.download)

        await page.waitFor(3000)
        await browser.close()


    } catch (err) {
        console.log("Error :: ", err)
    }
}

getLinkedin()