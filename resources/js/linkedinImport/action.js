const fs = require('fs')
const puppeteer = require('puppeteer')
const { link, loginSelector, account } = require('./config')

const getCookies = async () => {

    try {

        const browser = await puppeteer.launch({
            headless: false,
        })

        const page = await browser.newPage()
        await page.setViewport({
            width: 1280,
            height: 800
        })

        await page.goto(link, { waitUntil: 'networkidle2' })

        await page.waitForSelector(loginSelector.input1)
        await page.focus(loginSelector.input1)
        await page.keyboard.type(account.username)

        await page.waitForSelector(loginSelector.input2)
        await page.focus(loginSelector.input2)
        await page.keyboard.type(account.password)

        await page.waitForSelector(loginSelector.signin)
        await page.click(loginSelector.signin, { waitUntil: 'networkidle2' })

        const cookies = await page.cookies()

        fs.writeFileSync('cookies.json', JSON.stringify(cookies))
        await page.waitFor(15000)

        console.log("Operation Successful...")
        await browser.close();

    } catch(err) {
       console.log(err)
    }
}

getCookies()



