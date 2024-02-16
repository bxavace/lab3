<h1>Contact Form</h1>

<div class="form-group">
    <div class="nes-field">
    <label for="name_field">Your name</label>
    <input type="text" id="name_field" class="nes-input">
    </div>

    <div class="nes-field">
    <label for="name_field">Your email</label>
    <input type="text" id="name_field" class="nes-input">
    </div>

    <label for="textarea_field">Your message</label>
    <textarea id="textarea_field" class="nes-textarea"></textarea>

    <section>
        <button type="submit" class="nes-btn is-primary" onclick="document.getElementById('dialog-default').showModal();">
            Submit
        </button>
        <dialog class="nes-dialog" id="dialog-default">
            <form method="dialog">
            <p class="title nes-text is-success">Message sent.</p>
            <p>I'll get back to you soon!</p>
            <menu class="dialog-menu">
                <button class="nes-btn is-success">Confirm</button>
            </menu>
            </form>
        </dialog>
    </section>

    <div class="other-contact">
        <p>Or you can reach me at:</p>
        <div class="socials">
            <a href="https://facebook.com/bryllenunez43"><i class="nes-icon facebook is-medium"></i></a>
            <a href="mailto:brylleace.nunez@gmail.com"><i class="nes-icon google is-medium"></i></a>
            <a href="https://www.linkedin.com/in/brylleace-nunez/"><i class="nes-icon linkedin is-medium"></i></a>
        </div>
    </div>
</div>