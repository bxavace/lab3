<h1>Contact Form</h1>

<div class="form-group">
    <form method="POST" action="<?= site_url('contact/processForm'); ?>">
        <div class="nes-field">
            <label for="name_field">Your name <span class="error">*</span></label>
            <input type="text" id="name_field" name="name" class="nes-input" value="">
        </div>
        
        <div class="nes-field">
            <label for="email_field">Your email <span class="error">*</span></label>
            <input type="text" id="email_field" name="email" class="nes-input" value="">
        </div>
    
        <div class="nes-field">
            <label for="textarea_field">Your message <span class="error">*</span></label>
            <textarea id="textarea_field" name="message" class="nes-textarea"></textarea>
        </div>
        <br>
        <button type="submit" class="nes-btn is-primary">
            Submit
        </button>
    </form>

    <div class="other-contact">
        <p>Or you can reach me at:</p>
        <div class="socials">
            <a href="https://facebook.com/bryllenunez43"><i class="nes-icon facebook is-medium"></i></a>
            <a href="mailto:brylleace.nunez@gmail.com"><i class="nes-icon google is-medium"></i></a>
            <a href="https://www.linkedin.com/in/brylleace-nunez/"><i class="nes-icon linkedin is-medium"></i></a>
        </div>
    </div>
</div>