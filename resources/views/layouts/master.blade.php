<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
    <title>Sanggar Tari Ayunindya's</title>
    @include('layouts/partials/css')
<style type="text/css">
  canvas{
    height:100vh;
    background-color:#fff;
}
</style>
</head>

<body>
    <header class="miri-ui-kit-header landing-header header-bg-2">
        @include('layouts/partials/nav')
          <div
            class="miri-ui-kit-header-content  text-white d-flex flex-column justify-content-center container text-right">
            <h1 class="display-3 text-white text"></h1>
            {{-- <p class="h3 font-weight-light text-white"></p> --}}
            <p class="mt-4"><button class="btn btn-success btn-pill">Register Now</button></p>
        </div>
    </header>
    @yield('content')
    
    <footer class="pt-5 mt-2">
        <div class="container">
            <nav class="navbar navbar-light bg-transparent navbar-expand d-block d-sm-flex text-center">
                <span class="navbar-text">&copy; Sanggar Tari. All rights reserved.</span>
                <div class="navbar-nav ml-auto justify-content-center">
                    <a href="#" class="nav-link">Support</a>
                    <a href="#" class="nav-link">Terms</a>
                    <a href="#" class="nav-link">Privacy</a>
                </div>
            </nav>
        </div>
    </footer>
   
    @include('layouts/partials/js')
   
    @yield('javascript')

<script type="text/javascript">
  // ——————————————————————————————————————————————————
// TextScramble
// ——————————————————————————————————————————————————

class TextScramble {
  constructor(el) {
    this.el = el
    this.chars = '!<>-_\\/[]{}—=+*^?#________AIUEO$%'
    // this.chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
    this.update = this.update.bind(this)
  }
  setText(newText) {
    const oldText = this.el.innerText
    const length = Math.max(oldText.length, newText.length)
    const promise = new Promise((resolve) => this.resolve = resolve)
    this.queue = []
    for (let i = 0; i < length; i++) {
      const from = oldText[i] || ''
      const to = newText[i] || ''
      const start = Math.floor(Math.random() * 40)
      const end = start + Math.floor(Math.random() * 40)
      this.queue.push({ from, to, start, end })
    }
    cancelAnimationFrame(this.frameRequest)
    this.frame = 0
    this.update()
    return promise
  }
  update() {
    let output = ''
    let complete = 0
    for (let i = 0, n = this.queue.length; i < n; i++) {
      let { from, to, start, end, char } = this.queue[i]
      if (this.frame >= end) {
        complete++
        output += to
      } else if (this.frame >= start) {
        if (!char || Math.random() < 0.28) {
          char = this.randomChar()
          this.queue[i].char = char
        }
        output += `<span class="dud">${char}</span>`
      } else {
        output += from
      }
    }
    this.el.innerHTML = output
    if (complete === this.queue.length) {
      this.resolve()
    } else {
      this.frameRequest = requestAnimationFrame(this.update)
      this.frame++
    }
  }
  randomChar() {
    return this.chars[Math.floor(Math.random() * this.chars.length)]
  }
}

// ——————————————————————————————————————————————————
// Example
// ——————————————————————————————————————————————————

const phrases = [
  // 'Indihealth',
  'Dianesha-care',
  'Konsultasi Kesehatan',
  'E-Medical Record',
  'Video Conference',
]

const el = document.querySelector('.text')
const fx = new TextScramble(el)

let counter = 0
const next = () => {
  fx.setText(phrases[counter]).then(() => {
    setTimeout(next, 800)
  })
  counter = (counter + 1) % phrases.length
}

next()
</script>
</body>

</html>