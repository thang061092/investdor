@if($config_view && $config_view['financial'] == 'active')
    @if(!empty($project->financials))
        <section id="financial" class="financial wow fadeInUp">
            <div class="container">
                <p class="title_lg text-center">Financial</p>
                <div class="char pb-4">
                    <div class="d-flex justify-content-between">
                        <div class="char-display">
                            <div title="Equity: 60%" class="percent-1 percent" style="height: 60%"></div>
                            <div title="Equity: 40%" class="percent-2 percent" style="height: 40%"></div>
                        </div>
                        <div class="char-detail">
                            <div class="percent-detail percent-detail-1">
                                <p class="title">Equity: $12.000.000</p>
                                <div class="reconds">
                                    <p class="recond">
                                        88.3% LP Investor Equity - $XX.XXX.XXX
                                    </p>
                                    <p class="recond">
                                        88.3% LP Investor Equity - $XX.XXX.XXX
                                    </p>
                                </div>
                            </div>
                            <div class="percent-detail percent-detail-2">
                                <p class="title">Equity: $12.000.000</p>
                                <div class="reconds">
                                    <p class="recond">
                                        88.3% LP Investor Equity - $XX.XXX.XXX
                                    </p>
                                    <p class="recond">
                                        88.3% LP Investor Equity - $XX.XXX.XXX
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center total mt-lg-4 mt-3" id="total">
                    TOTAL: %XX.XXX.XXX
                </div>
                <div class="toggle-content mt-2 mb-xl-3 mb-2 pb-1 box-images">
                    <p class="btn_toggle d-flex align-items-center">
                        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                             viewBox="0 0 20 20"
                             fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M9.99935 3.33301C10.4596 3.33301 10.8327 3.7061 10.8327 4.16634V15.833C10.8327 16.2932 10.4596 16.6663 9.99935 16.6663C9.53911 16.6663 9.16602 16.2932 9.16602 15.833V4.16634C9.16602 3.7061 9.53911 3.33301 9.99935 3.33301Z"
                                  fill="#03204C"/>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M3.33398 10.0003C3.33398 9.54009 3.70708 9.16699 4.16732 9.16699H15.834C16.2942 9.16699 16.6673 9.54009 16.6673 10.0003C16.6673 10.4606 16.2942 10.8337 15.834 10.8337H4.16732C3.70708 10.8337 3.33398 10.4606 3.33398 10.0003Z"
                                  fill="#03204C"/>
                        </svg>
                        Nguồn & Sử dụng
                    </p>
                    <div class="content mt-3" style="display: none">
                        <div class="s-content">
                            <p>
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Quisquam dolores optio
                                accusamus quidem tenetur velit at animi dolore
                                tempore repellat vero culpa atque a ex,
                                similique recusandae inventore voluptates!
                                Consequuntur!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="toggle-content mb-xl-3 mb-4 pb-1 box-images">
                    <p class="btn_toggle d-flex align-items-center">
                        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                             viewBox="0 0 20 20"
                             fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M9.99935 3.33301C10.4596 3.33301 10.8327 3.7061 10.8327 4.16634V15.833C10.8327 16.2932 10.4596 16.6663 9.99935 16.6663C9.53911 16.6663 9.16602 16.2932 9.16602 15.833V4.16634C9.16602 3.7061 9.53911 3.33301 9.99935 3.33301Z"
                                  fill="#03204C"/>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M3.33398 10.0003C3.33398 9.54009 3.70708 9.16699 4.16732 9.16699H15.834C16.2942 9.16699 16.6673 9.54009 16.6673 10.0003C16.6673 10.4606 16.2942 10.8337 15.834 10.8337H4.16732C3.70708 10.8337 3.33398 10.4606 3.33398 10.0003Z"
                                  fill="#03204C"/>
                        </svg>
                        Các giả định về Nợ
                    </p>
                    <div class="content mt-3" style="display: none">
                        <div class="s-content">
                            <p>
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Quisquam dolores optio
                                accusamus quidem tenetur velit at animi dolore
                                tempore repellat vero culpa atque a ex,
                                similique recusandae inventore voluptates!
                                Consequuntur!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="toggle-content mb-xl-3 mb-4 pb-1 box-images">
                    <p class="btn_toggle d-flex align-items-center">
                        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                             viewBox="0 0 20 20"
                             fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M9.99935 3.33301C10.4596 3.33301 10.8327 3.7061 10.8327 4.16634V15.833C10.8327 16.2932 10.4596 16.6663 9.99935 16.6663C9.53911 16.6663 9.16602 16.2932 9.16602 15.833V4.16634C9.16602 3.7061 9.53911 3.33301 9.99935 3.33301Z"
                                  fill="#03204C"/>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M3.33398 10.0003C3.33398 9.54009 3.70708 9.16699 4.16732 9.16699H15.834C16.2942 9.16699 16.6673 9.54009 16.6673 10.0003C16.6673 10.4606 16.2942 10.8337 15.834 10.8337H4.16732C3.70708 10.8337 3.33398 10.4606 3.33398 10.0003Z"
                                  fill="#03204C"/>
                        </svg>
                        Phân phối
                    </p>
                    <div class="content mt-3" style="display: none">
                        <div class="s-content">
                            <p>
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Quisquam dolores optio
                                accusamus quidem tenetur velit at animi dolore
                                tempore repellat vero culpa atque a ex,
                                similique recusandae inventore voluptates!
                                Consequuntur!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endif
