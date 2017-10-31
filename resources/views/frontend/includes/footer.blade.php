<footer>
    <div id="contact_footer" class="contact-section" itemscope itemtype="https://schema.org/Organization">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="titie-section wow fadeInDown animated ">
                        <h1>ENTRE EM CONTATO</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 wow fadeInLeft animated">
                    <div class="left-content">
                        <h1><span>C</span>riatório <span>C</span>hideroli</h1>
                        <h3>Venhar conhecer nosso criatório!</h3>
                        <p itemprop="description">Temos os melhore galos e galinhas de porte Indio Gigante em todo estado de São Paulo</p>
                        <duv class="contact-info">
                            <address itemprop="address" itemscope itemtype="https://schema.org/PostalAddress" style="margin: 0; padding: 0;">
                                <p>
                                    <b>Endereço:</b> <span itemprop="streetAddress">Est. Vicinal Arlindo Pizzo, KM 1,1, Água Limpa</span>
                                    - <span itemprop="addressLocality">Glicério</span>/<span itemprop="addressRegion">SP</span>
                                    - CEP <span itemprop="postalCode">16270-000</span>
                                </p>
                            </address>
                            <p><b>Telefone:</b> <span itemprop="telephone">(18) 99777-1101</span></p>
                            <p><b>E-mail:</b> <span itemprop="email">criatoriochideroli@gmail.com</span></p>
                        </duv>
                        <div class="social-media">
                            <ul>
                                <li><a href="{{ env('FACEBOOK_SOCIAL_LINK') }}" itemprop="url" rel="nofollow" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{ env('TWITTER_SOCIAL_LINK') }}" itemprop="url" rel="nofollow" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="{{ env('YOUTUBE_SOCIAL_LINK') }}" itemprop="url" rel="nofollow" target="_blank" data-toggle="tooltip" data-placement="bottom" title="YouTube"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="{{ env('GOOGLEPLUS_SOCIAL_LINK') }}" itemprop="url" rel="nofollow" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Google+"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="{{ env('INSTAGRAM_SOCIAL_LINK') }}" itemprop="url" rel="nofollow" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInRight animated">
                    {{ Form::open(['route' => 'frontend.contact.send', 'class' => 'contact-form', 'method' => 'POST']) }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" maxlength="191" name="name" placeholder="Seu Nome" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" maxlength="191" name="phone" placeholder="Telefone">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <input type="email" class="form-control" maxlength="191" name="email" placeholder="Seu Email" style="margin-bottom: 30px;" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <textarea name="message" class="form-control" maxlength="191" cols="30" rows="5" placeholder="Sua Mensagem..." required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <button type="submit" class="contact-submit">Enviar</button>
                                </div>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="center">Copyright &copy; 2017. <a title="Criatório Chideroli" href="#">Criatório Chideroli</a> - Todos Direitos Reservados</p>
                </div>
            </div>
        </div>
    </div>
</footer>