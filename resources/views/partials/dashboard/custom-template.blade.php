  <!-- Custom template | don't include it in your project! -->
  <div class="custom-template">
      <div class="title">Settings</div>
      <div class="custom-content">
          <div class="switcher">
              <div class="switch-block">
                  <h4>Logo Header</h4>
                  <div class="btnSwitch">
                      <button type="button" class="{{ $logoColor == 'dark' ? 'selected' : '' }} changeLogoHeaderColor"
                          data-color="dark"></button>
                      <button type="button" class="{{ $logoColor == 'blue' ? 'selected' : '' }} changeLogoHeaderColor"
                          data-color="blue"></button>
                      <button type="button"
                          class="{{ $logoColor == 'purple' ? 'selected' : '' }} changeLogoHeaderColor"
                          data-color="purple"></button>
                      <button type="button"
                          class="{{ $logoColor == 'light-blue' ? 'selected' : '' }} changeLogoHeaderColor"
                          data-color="light-blue"></button>
                      <button type="button" class="{{ $logoColor == 'green' ? 'selected' : '' }} changeLogoHeaderColor"
                          data-color="green"></button>
                      <button type="button"
                          class="{{ $logoColor == 'orange' ? 'selected' : '' }} changeLogoHeaderColor"
                          data-color="orange"></button>
                      <button type="button" class="{{ $logoColor == 'red' ? 'selected' : '' }} changeLogoHeaderColor"
                          data-color="red"></button>
                      <button type="button" class="{{ $logoColor == 'white' ? 'selected' : '' }} changeLogoHeaderColor"
                          data-color="white"></button>
                      <br />
                      <button type="button" class="{{ $logoColor == 'dark2' ? 'selected' : '' }} changeLogoHeaderColor"
                          data-color="dark2"></button>
                      <button type="button" class="{{ $logoColor == 'blue2' ? 'selected' : '' }} changeLogoHeaderColor"
                          data-color="blue2"></button>
                      <button type="button"
                          class="{{ $logoColor == 'purple2' ? 'selected' : '' }} changeLogoHeaderColor"
                          data-color="purple2"></button>
                      <button type="button"
                          class="{{ $logoColor == 'light-blue2' ? 'selected' : '' }} changeLogoHeaderColor"
                          data-color="light-blue2"></button>
                      <button type="button"
                          class="{{ $logoColor == 'green2' ? 'selected' : '' }} changeLogoHeaderColor"
                          data-color="green2"></button>
                      <button type="button"
                          class="{{ $logoColor == 'orange2' ? 'selected' : '' }} changeLogoHeaderColor"
                          data-color="orange2"></button>
                      <button type="button" class="{{ $logoColor == 'red2' ? 'selected' : '' }} changeLogoHeaderColor"
                          data-color="red2"></button>
                  </div>
              </div>
              <div class="switch-block">
                  <h4>Navbar Header</h4>
                  <div class="btnSwitch">
                      <button type="button" class="{{ $topbarColor == 'dark' ? 'selected' : '' }} changeTopBarColor"
                          data-color="dark"></button>
                      <button type="button" class="{{ $topbarColor == 'blue' ? 'selected' : '' }} changeTopBarColor"
                          data-color="blue"></button>
                      <button type="button" class="{{ $topbarColor == 'purple' ? 'selected' : '' }} changeTopBarColor"
                          data-color="purple"></button>
                      <button type="button"
                          class="{{ $topbarColor == 'light-blue' ? 'selected' : '' }} changeTopBarColor"
                          data-color="light-blue"></button>
                      <button type="button" class="{{ $topbarColor == 'green' ? 'selected' : '' }} changeTopBarColor"
                          data-color="green"></button>
                      <button type="button" class="{{ $topbarColor == 'orange' ? 'selected' : '' }} changeTopBarColor"
                          data-color="orange"></button>
                      <button type="button" class="{{ $topbarColor == 'red' ? 'selected' : '' }} changeTopBarColor"
                          data-color="red"></button>
                      <button type="button" class="{{ $topbarColor == 'white' ? 'selected' : '' }} changeTopBarColor"
                          data-color="white"></button>
                      <br />
                      <button type="button" class="{{ $topbarColor == 'dark2' ? 'selected' : '' }} changeTopBarColor"
                          data-color="dark2"></button>
                      <button type="button" class="{{ $topbarColor == 'blue2' ? 'selected' : '' }} changeTopBarColor"
                          data-color="blue2"></button>
                      <button type="button"
                          class="{{ $topbarColor == 'purple2' ? 'selected' : '' }} changeTopBarColor"
                          data-color="purple2"></button>
                      <button type="button"
                          class="{{ $topbarColor == 'light-blue2' ? 'selected' : '' }} changeTopBarColor"
                          data-color="light-blue2"></button>
                      <button type="button" class="{{ $topbarColor == 'green2' ? 'selected' : '' }} changeTopBarColor"
                          data-color="green2"></button>
                      <button type="button"
                          class="{{ $topbarColor == 'orange2' ? 'selected' : '' }} changeTopBarColor"
                          data-color="orange2"></button>
                      <button type="button" class="{{ $topbarColor == 'red2' ? 'selected' : '' }} changeTopBarColor"
                          data-color="red2"></button>
                  </div>
              </div>
              <div class="switch-block">
                  <h4>Sidebar</h4>
                  <div class="btnSwitch">
                      <button type="button"
                          class="{{ $sidebarColor == 'dark' ? 'selected' : '' }} changeSideBarColor"
                          data-color="dark"></button>
                      <button type="button"
                          class="{{ $sidebarColor == 'blue' ? 'selected' : '' }} changeSideBarColor"
                          data-color="blue"></button>
                      <button type="button"
                          class="{{ $sidebarColor == 'purple' ? 'selected' : '' }} changeSideBarColor"
                          data-color="purple"></button>
                      <button type="button"
                          class="{{ $sidebarColor == 'light-blue' ? 'selected' : '' }} changeSideBarColor"
                          data-color="light-blue"></button>
                      <button type="button"
                          class="{{ $sidebarColor == 'green' ? 'selected' : '' }} changeSideBarColor"
                          data-color="green"></button>
                      <button type="button"
                          class="{{ $sidebarColor == 'orange' ? 'selected' : '' }} changeSideBarColor"
                          data-color="orange"></button>
                      <button type="button"
                          class="{{ $sidebarColor == 'red' ? 'selected' : '' }} changeSideBarColor"
                          data-color="red"></button>
                      <button type="button"
                          class="{{ $sidebarColor == 'white' ? 'selected' : '' }} changeSideBarColor"
                          data-color="white"></button>
                      <br />
                      <button type="button"
                          class="{{ $sidebarColor == 'dark2' ? 'selected' : '' }} changeSideBarColor"
                          data-color="dark2"></button>
                      <button type="button"
                          class="{{ $sidebarColor == 'blue2' ? 'selected' : '' }} changeSideBarColor"
                          data-color="blue2"></button>
                      <button type="button"
                          class="{{ $sidebarColor == 'purple2' ? 'selected' : '' }} changeSideBarColor"
                          data-color="purple2"></button>
                      <button type="button"
                          class="{{ $sidebarColor == 'light-blue2' ? 'selected' : '' }} changeSideBarColor"
                          data-color="light-blue2"></button>
                      <button type="button"
                          class="{{ $sidebarColor == 'green2' ? 'selected' : '' }} changeSideBarColor"
                          data-color="green2"></button>
                      <button type="button"
                          class="{{ $sidebarColor == 'orange2' ? 'selected' : '' }} changeSideBarColor"
                          data-color="orange2"></button>
                      <button type="button"
                          class="{{ $sidebarColor == 'red2' ? 'selected' : '' }} changeSideBarColor"
                          data-color="red2"></button>
                  </div>
              </div>
              <div class="switch-block">
                  <h4>Background</h4>
                  <div class="btnSwitch">
                      <button type="button" class="{{ $bgColor == 'bg2' ? 'selected' : '' }} changeBackgroundColor"
                          data-color="bg2"></button>
                      <button type="button"
                          class="{{ $bgColor == 'bg1' ? 'selected' : '' }} changeBackgroundColor"
                          data-color="bg1"></button>
                      <button type="button" class="{{ $bgColor == 'bg3' ? 'selected' : '' }} changeBackgroundColor"
                          data-color="bg3"></button>
                          <button type="button" class="{{ $bgColor == 'dark' ? 'selected' : '' }} changeBackgroundColor"
                              data-color="dark"></button>
                      
                  </div>
              </div>
          </div>
      </div>
      <div class="custom-toggle">
          <i class="flaticon-settings"></i>
      </div>
  </div>
  <!-- End Custom template -->
