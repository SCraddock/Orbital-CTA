<section class="bg--gradient">
  <div class="grid grid--thirds-alt grid--full text--center">
    <div>
      <div class="cta--footer" data-form="form1">
        <div class="font--stylised color--mid">Have a project brief?</div>
        <div class="font--large font--alt color--blanc">Upload It Here</div>
      </div>
    </div>
    <div>
      <div class="cta--footer" data-form="form3">
        <div class="font--stylised color--mid">I have a project?</div>
        <div class="font--large font--alt color--blanc">Help me plan it</div>
      </div>
    </div>
    <div>
      <div class="cta--footer" data-form="form2">
        <div class="font--stylised color--mid">Grab a coffee?</div>
        <div class="font--large font--alt color--blanc">Book a meeting</div>
      </div>
    </div>
  </div>
  <section class="padded cta-form">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="container color--blanc" id="form1" enctype="multipart/form-data">
      <input type="hidden" name="frmname" value="formOne"/>
      <input type="hidden" name="CarrotStick" value=""/>
      <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
      



      <div class="font--large font--alt rhythm--double">If you already have a project that you have prepared or possibly briefed in to an agency, fill in your details and upload it below.  We will get to work to supply an outline solution and costs via email as soon as possible.</div>

      <div class="grid grid--aside grid--wide grid--reverse">
        <div>
          <div class="font--small rhythm">
            <div class="color--mid rhythm--half"><span class="font--stylised">Brief</span><i class="right">Accepted formats: pdf, doc, docx, rtf</i></div>

            <div class="upload-container text--center">
              <div>
                Drag and drop your brief here, or <u>browse</u> for a document to upload <i class="color--mid">(Max file size : 10Mb)</i><br>
                <i  class="color--mid filename fileError"></i>
              </div>
              <input id="uploaded-brief" type="file" name="file" value="" >
            </div>
          </div>

          <div class="grid grid--aside">
            <div>
              <i class="color--mid font--small">We will never pass or sell on your personal details. Promise.</i>
            </div>
            <div class="text--right">
              <button id="submit1" class="btn btn--small btn--primary font--small" type="submit" name="submit"> &nbsp; &nbsp; Upload Brief &nbsp; &nbsp; </button>
            </div>
          </div>
        </div>

        <div>
          <div class="input-container rhythm error-dot">
            <input type="text" name="name" >
            <label class="font--stylised color--mid" for="name">Name <span class="color--secondary">*</span></label>
          </div>
          <div class="input-container rhythm error-dot">
            <input type="text" name="email" >
            <label class="font--stylised color--mid" for="email">Email <span class="color--secondary">*</span></label>
          </div>
          <div class="input-container">
            <input type="text" name="phone">
            <label class="font--stylised color--mid" for="phone">Phone Number</label>
          </div>
        </div>
      </div>

    </form>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="container color--blanc" id="form2">
      <input type="hidden" name="frmname" value="formTwo"/>
      <input type="hidden" name="CarrotStick" value=""/>
      <div class="font--large font--alt rhythm--double">If you have a more complex project, or a simple one that you would just like to cut through, let us know where and when, we’d love to meet and discuss great ideas to get your project moving.</div>


      <div class="grid grid--aside grid--wide grid--reverse">
        <div>
          <div id="bookDates" class="font--small rhythm error-dot">
            <div  class="font--stylised color--mid rhythm--half pos-rel">Book a Meeting</div>

            <div  class="grid grid--narrow radio-list ">
              <div class="check--date">
                <div class="radio-btn btn--block">
                  <input type="checkbox" name="date[]" value="mar18">
                  March 18th
                </div>
                <div class="grid grid--narrow radio-list radio-list--sub">
                  <div>
                    <div class="radio-btn--sub btn--block">
                      <input type="checkbox" name="time[]" value="09:30">
                      09:30
                    </div>
                  </div>
                  <div>
                    <div class="radio-btn--sub btn--block">
                      <input type="checkbox" name="time[]" value="12:30">
                      12:30
                    </div>
                  </div>
                </div>
              </div>
              <div class="check--date">
                <div class="radio-btn btn--block">
                  <input type="checkbox" name="date[]" value="mar19">
                  March 19th
                </div>
                <div class="grid grid--narrow radio-list radio-list--sub">
                  <div>
                    <div class="radio-btn--sub btn--block">
                      <input type="checkbox" name="time[]" value="09:30">
                      09:30
                    </div>
                  </div>
                  <div>
                    <div class="radio-btn--sub btn--block">
                      <input type="checkbox" name="time[]" value="12:30">
                      12:30
                    </div>
                  </div>
                </div>
              </div>
              <div class="check--date">
                <div class="radio-btn btn--block">
                  <input type="checkbox" name="date[]" value="mar20">
                  March 20th
                </div>
                <div class="grid grid--narrow radio-list radio-list--sub">
                  <div>
                    <div class="radio-btn--sub btn--block">
                      <input type="checkbox" name="time[]" value="09:30">
                      09:30
                    </div>
                  </div>
                  <div>
                    <div class="radio-btn--sub btn--block">
                      <input type="checkbox" name="time[]" value="12:30">
                      12:30
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div id="formLocation" class="font--small rhythm error-dot">
            <div class="pos-rel font--stylised color--mid rhythm--half">Location</div>

            <div class="grid grid--narrow radio-list">
              <div>
                <div class="radio-btn btn--block error-dot">
                  <input type="checkbox" name="location[]" value="Orbital HQ">
                  Orbital
                </div>
              </div>
              <div>
                <div class="radio-btn btn--block">
                  <input type="checkbox" name="location[]" value="Their HQ">
                  Your HQ
                </div>
              </div>
              <div class="text--right">
                <button id="submit2" class="btn btn--small btn--primary font--small" type="submit" name="submit"> &nbsp; &nbsp; Book Now &nbsp; &nbsp; </button>
              </div>
            </div>
          </div>
        </div>

        <div>
          <div class="input-container rhythm error-dot">
            <input type="text" name="name" >
            <label class="font--stylised color--mid" for="name">Name <span class="color--secondary">*</span></label>
          </div>
          <div class="input-container rhythm error-dot">
            <input type="text" name="email" >
            <label class="font--stylised color--mid" for="email">Email <span class="color--secondary">*</span></label>
          </div>
          <div class="input-container">
            <input type="text" name="phone" >
            <label class="font--stylised color--mid" for="phone">Phone Number</label>
          </div>
        </div>
      </div>
    </form>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="container color--blanc" id="form3">
      <input type="hidden" name="frmname" value="formThree"/>
      <input type="hidden" name="CarrotStick" value=""/>
      <div class="font--large font--alt rhythm--double">If you have a project in mind, or an idea that you would like help with, please use the form below to tell us about it, and briefly what you would like to achieve.  Let us know if you would like to talk it through, or send great ideas via email, or both.</div>

      <div class="grid grid--aside grid--wide grid--reverse">
        <div>
          <div class="font--small rhythm--double error-dot">
            <div class="pos-rel font--stylised color--mid rhythm--half">Services</div>

            <div class="grid grid--fifths grid--narrow">
              <div>
                <div class="check-btn btn--block">

                  <input type="checkbox" name="service[]" value="Web" >
                  Web
                </div>
              </div>
              <div>
                <div class="check-btn btn--block ">

                  <input type="checkbox" name="service[]" value="Apps" >
                  Apps
                </div>
              </div>
              <div>
                <div class="check-btn btn--block">

                  <input type="checkbox" name="service[]" value="Video">
                  Video
                </div>
              </div>
              <div>
                <div class="check-btn btn--block">
                  <input type="checkbox" name="service[]" value="Photography">
                  Photography
                </div>
              </div>
              <div>
                <div class="check-btn btn--block">
                  <input type="checkbox" name="service[]" value="Digital Marketing">
                  Digital Marketing
                </div>
              </div>
              <div>
                <div class="check-btn btn--block">
                  <input type="checkbox" name="service[]" value="Branding">
                  Branding
                </div>
              </div>
              <div>
                <div class="check-btn btn--block">
                  <input type="checkbox" name="service[]" value="Creative">
                  Creative
                </div>
              </div>
            </div>
          </div>

          <div class="textarea-container rhythm error-dot">

            <div class="opa-non edit-area" contenteditable='true'></div>
            <label class="font--stylised color--mid" for="message" >Your Message</label>
            <textarea name="message" hidden ></textarea>
          </div>

          <div class="grid grid--aside">
            <div>
              <i class="color--mid font--small">We will never pass or sell on your personal details. Promise.</i>
            </div>
            <div class="text--right">
              <button id="submit3" class="btn btn--small btn--primary font--small" type="submit" name="submit"> &nbsp; &nbsp; Send Message &nbsp; &nbsp; </button>
            </div>
          </div>
        </div>

        <div>
          <div class="input-container rhythm error-dot">
            <input type="text" name="name" >
            <label class="font--stylised color--mid" for="name">Name <span class="color--secondary">*</span></label>
          </div>
          <div class="input-container rhythm error-dot">
            <input type="text" name="email" >
            <label class="font--stylised color--mid" for="email">Email <span class="color--secondary">*</span></label>
          </div>
          <div class="input-container">
            <input type="text" name="phone" >
            <label class="font--stylised color--mid" for="phone">Phone Number</label>
          </div>
        </div>
      </div>
    </form>
  </section>
</section>
