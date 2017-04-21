<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="uXVF4p2g75qLIM4NZba4xxzPKyzjgMk5X9701GzD">

    <title>全新环境安装Homestead</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="http://cdn.webfont.youziku.com/webfonts/nomal/100344/45809/58d3e741f629d803ac74bbe1.css"
          rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="http://blog.lerzen.com/vendor/editormd/css/editormd.min.css">
    <link rel="stylesheet" href="http://blog.lerzen.com/vendor/editormd/css/editormd.preview.css">
    <style>
        #content-editormd-view {
            padding-top: 0;
            background-color: rgba(255, 255, 255, 0.3);
        }

        .title-wrap {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding-bottom: 20px;
            margin-bottom: 20px;
        }

        .title-wrap h2 {
            border: 0;
            padding-bottom: 12px;
            margin-bottom: 0;
        }

        .article-count {
            color: #aaa;
        }

        .editormd-html-preview code {
            background-color: rgba(255, 255, 255, 0.1);
            border: 0;
        }

        .editormd-html-preview blockquote {
            border-left: 4px solid rgba(255, 255, 255, 0.1);
        }

        .editormd-html-preview pre.prettyprint {
            border: 1px solid rgba(255, 255, 255, 0.1);
            background-color: rgba(255, 255, 255, 0.1);
        }

        .editormd-html-preview pre.prettyprint li.L1, li.L3, li.L5, li.L7, li.L9 {
            background-color: transparent;
        }
    </style>
    <link rel="stylesheet" href="http://blog.lerzen.com/vendor/share/css/share.min.css" type="text/css">
    <style>
        .social-share {
            border-top: 1px dashed #ddd;
            padding: 15px 0 0 15px;
            margin-top: 30px;
        }
    </style>
    <link type="text/css" rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/KaTeX/0.3.0/katex.min.css">
    <script id="-cdnjs-cloudflare-com-ajax-libs-KaTeX-0-3-0-katex-min" type="text/javascript"
            src="//cdnjs.cloudflare.com/ajax/libs/KaTeX/0.3.0/katex.min.js"></script>
</head>
<body>
<div style="margin:0 auto;width:0px;height:0px;overflow:hidden;"><img src="http://qiniu.blog.lerzen.com/logo.png"></div>
<div id="app" style="height: 680px;">
    <header><a href="http://blog.lerzen.com" class="css9a0e8a0be187f8">
            悟禅小书童
        </a> <span class="pull-right admin-cmd-wrap"><a rel="nofollow" href="http://blog.lerzen.com/login"
                                                        class="external beian"><i class="fa fa-sign-in"></i></a></span>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="col-md-12">
                    <div id="content-editormd-view" class="markdown-body editormd-html-preview">
                        <div class="title-wrap text-left"><h2>全新环境安装Homestead</h2>
                            <div class="text-left article-count"><span>发布于1天前</span>
                                ⋅
                                <span>73阅读</span></div>
                        </div>
                        <div></div>
                        <h3 id="h3-homestead-"><a name="Homestead 与 虚拟机" class="reference-link"></a><span
                                    class="header-link octicon octicon-link"></span>Homestead 与 虚拟机</h3>
                        <p>Laravel Homestead 是一个官方预封装的 Vagrant box，提供给你一个完美的开发环境，你无需在本机电脑上安装 PHP、HHVM、Web
                            服务器或其它服务器软件。并且不用再担心系统被搞乱！Vagrant box 为你搞定一切。如果有什么地方出错了，你也可以在几分钟内快速的销毁并重建虚拟机！</p>
                        <ul>
                            <li><a href="https://www.virtualbox.org/wiki/Downloads">VirtualBox</a> — Oracle 公司的虚拟机软件,
                                能运行在当前大部分流行的系统上;
                            </li>
                            <li><a href="https://www.vagrantup.com/downloads.html">Vagrant</a> —
                                一个虚拟机管理软件。提供简单、优雅的方式来管理与配置虚拟机，Homestead 构建于 Vagrant 之上, Homestead 正是构建在 Vagrant 之上;
                            </li>
                            <li><p><a href="http://d.laravel-china.org/docs/5.3/homestead">Laravel Homestead</a> — 是
                                    Laravel 官方预封装的一个 Vagrant Box，它是一台虚拟机的原型，运行在 VirtualBox 上，提供一个完美的开发环境，你无需在本机电脑上安装
                                    PHP、HHVM、Web 服务器或其它服务器软件。并且不用再担心系统被搞乱，如果有什么地方出错了，可以在几分钟内快速的销毁并重建虚拟机！</p>
                                <blockquote>
                                    <p>Homestead 可以在 Windows、Mac 或 Linux 系统上面运行，包括以下两个东西</p>
                                    <ol>
                                        <li>一个 vagrant box 虚拟机, 里面包含了 Nginx Web 服务器、PHP
                                            7.0、MySQL、Postgres、Redis、Memcached、Node，以及所有你在使用 Laravel 开发时所需要用到的各种软件。
                                        </li>
                                        <li>Github 代码库, 里面装载着 vagrant 的配置脚本, 用来自动化配置网络, 端口映射, 等一些开发时候用到的配置;</li>
                                    </ol>
                                </blockquote>
                            </li>
                        </ul>
                        <h3 id="h3--virtualbox-vagrant"><a name="安装 virtualbox 和 vagrant"
                                                           class="reference-link"></a><span
                                    class="header-link octicon octicon-link"></span>安装 virtualbox 和 vagrant</h3>
                        <p><a href="https://www.virtualbox.org/wiki/Downloads">virtualbox</a> 和 <a
                                    href="https://www.vagrantup.com/downloads.html">Vagrant</a>都提供了GUI软件，并且支持所有平台，点击链接下载对应平台的软件并安装即可。
                        </p>
                        <h3 id="h3--homestead-vagrant-box"><a name="安装 Homestead Vagrant box"
                                                              class="reference-link"></a><span
                                    class="header-link octicon octicon-link"></span>安装 Homestead Vagrant box</h3>
                        <p>当 VirtualBox / VMware 以及 Vagrant 安装完成后，你使用以下命令将 laravel/homestead 这个 box 安装进你的 Vagrant
                            程序中。box 的下载会花费你一点时间，具体的下载时长由网络速度决定:</p>
                        <pre class="prettyprint linenums prettyprinted"><ol class="linenums"><li class="L0"><code><span
                                                class="pln">vagrant box add laravel</span><span
                                                class="pun">/</span><span class="pln">homestead</span></code></li></ol></pre>
                        <blockquote>
                            <p>安装时会先让选择Provider，这里需要根据自己的虚拟机来选择，我选择的是virtualbox </p>
                        </blockquote>
                        <pre class="prettyprint linenums prettyprinted"><ol class="linenums"><li class="L0"><code><span
                                                class="pln">$ vagrant box add laravel</span><span
                                                class="pun">/</span><span class="pln">homestead</span></code></li><li
                                        class="L1"><code><span class="pun">==&gt;</span><span
                                                class="pln"> box</span><span class="pun">:</span><span
                                                class="pln"> </span><span class="typ">Loading</span><span class="pln"> metadata </span><span
                                                class="kwd">for</span><span class="pln"> box </span><span class="str">'laravel/homestead'</span></code></li><li
                                        class="L2"><code><span class="pln">box</span><span class="pun">:</span><span
                                                class="pln"> URL</span><span class="pun">:</span><span class="pln"> https</span><span
                                                class="pun">:</span><span class="com">//atlas.hashicorp.com/laravel/homestead</span></code></li><li
                                        class="L3"><code><span class="typ">This</span><span
                                                class="pln"> box can work </span><span class="kwd">with</span><span
                                                class="pln"> multiple providers</span><span class="pun">!</span><span
                                                class="pln"> </span><span class="typ">The</span><span class="pln"> providers that it</span></code></li><li
                                        class="L4"><code><span class="pln">can work </span><span class="kwd">with</span><span
                                                class="pln"> are listed below</span><span class="pun">.</span><span
                                                class="pln"> </span><span class="typ">Please</span><span class="pln"> review the list </span><span
                                                class="kwd">and</span><span class="pln"> choose</span></code></li><li
                                        class="L5"><code><span class="pln">the provider you will be working </span><span
                                                class="kwd">with</span><span class="pun">.</span></code></li><li
                                        class="L6"><code></code></li><li class="L7"><code><span
                                                class="lit">1</span><span class="pun">)</span><span
                                                class="pln"> hyperv</span></code></li><li class="L8"><code><span
                                                class="lit">2</span><span class="pun">)</span><span class="pln"> parallels</span></code></li><li
                                        class="L9"><code><span class="lit">3</span><span class="pun">)</span><span
                                                class="pln"> virtualbox</span></code></li><li class="L0"><code><span
                                                class="lit">4</span><span class="pun">)</span><span class="pln"> vmware_desktop</span></code></li><li
                                        class="L1"><code></code></li><li class="L2"><code><span class="typ">Enter</span><span
                                                class="pln"> your choice</span><span class="pun">:</span><span
                                                class="pln"> </span><span class="lit">3</span></code></li></ol></pre>
                        <p>实际安装过程中，安装过程总是很漫长，所以这里提供第二种安装方式</p>
                        <ol>
                            <li><p>复制上一种安装方式中的box下载链接，使用迅雷或其他工具进行下载</p>
                                <p><img src="http://on7c662n7.bkt.clouddn.com/vagrant_box_add_link.png" alt=""></p>
                            </li>
                            <li><p>下载完成后，修改文件名，建议如下格式：</p>
                                <pre class="prettyprint linenums prettyprinted"><ol class="linenums"><li
                                                class="L0"><code><span class="pln"> homestead</span><span
                                                        class="pun">-</span><span class="pln">virtualbox</span><span
                                                        class="pun">-[版本号].</span><span
                                                        class="pln">box</span></code></li><li class="L1"><code><span
                                                        class="pln"> </span><span class="pun">例如：</span><span
                                                        class="pln">homestead</span><span class="pun">-</span><span
                                                        class="pln">virtualbox</span><span class="pun">-</span><span
                                                        class="lit">2.0</span><span class="pun">.</span><span
                                                        class="lit">0.box</span></code></li></ol></pre>
                            </li>
                            <li><p>在文件同级目录下面创建文件 <strong>metadata.json</strong>，内容如下：</p>
                                <pre class="prettyprint linenums prettyprinted"><ol class="linenums"><li
                                                class="L0"><code><span class="pln"> </span><span
                                                        class="pun">{</span></code></li><li class="L1"><code><span
                                                        class="pln"> </span><span class="str">"name"</span><span
                                                        class="pun">:</span><span class="pln"> </span><span class="str">"laravel/homestead"</span><span
                                                        class="pun">,</span></code></li><li class="L2"><code><span
                                                        class="pln"> </span><span class="str">"versions"</span><span
                                                        class="pun">:</span><span class="pln"> </span></code></li><li
                                                class="L3"><code><span class="pln"> </span><span
                                                        class="pun">[</span></code></li><li class="L4"><code><span
                                                        class="pln">     </span><span class="pun">{</span></code></li><li
                                                class="L5"><code><span class="pln">         </span><span class="str">"version"</span><span
                                                        class="pun">:</span><span class="pln"> </span><span class="str">"[版本号]"</span><span
                                                        class="pun">,</span></code></li><li class="L6"><code><span
                                                        class="pln">         </span><span class="str">"providers"</span><span
                                                        class="pun">:</span><span class="pln"> </span><span class="pun">[</span></code></li><li
                                                class="L7"><code><span class="pln">             </span><span
                                                        class="pun">{</span></code></li><li class="L8"><code><span
                                                        class="pln">               </span><span
                                                        class="str">"name"</span><span class="pun">:</span><span
                                                        class="pln"> </span><span class="str">"virtualbox"</span><span
                                                        class="pun">,</span></code></li><li class="L9"><code><span
                                                        class="pln">               </span><span class="str">"url"</span><span
                                                        class="pun">:</span><span class="pln"> </span><span class="str">"/absoulute/path/to/homestead-virtualbox-[版本号].box"</span></code></li><li
                                                class="L0"><code><span class="pln">             </span><span
                                                        class="pun">}</span></code></li><li class="L1"><code><span
                                                        class="pln">         </span><span
                                                        class="pun">]</span></code></li><li class="L2"><code><span
                                                        class="pln">     </span><span class="pun">}</span></code></li><li
                                                class="L3"><code><span class="pln"> </span><span
                                                        class="pun">]</span></code></li></ol></pre>
                                <p> }</p>
                            </li>
                            <li><p>添加box并检查</p>
                                <pre class="prettyprint linenums prettyprinted"><ol class="linenums"><li
                                                class="L0"><code><span class="pln"> </span><span class="com"># 添加</span></code></li><li
                                                class="L1"><code><span class="pln"> vagrant box add </span><span
                                                        class="pun">/</span><span class="pln">path</span><span
                                                        class="pun">/</span><span class="pln">to</span><span
                                                        class="pun">/</span><span class="pln">metadata</span><span
                                                        class="pun">.</span><span class="pln">json</span></code></li><li
                                                class="L2"><code><span class="pln"> </span><span class="com"># 检查</span></code></li><li
                                                class="L3"><code><span class="pln"> vagrant box list</span></code></li></ol></pre>
                                <p> 操作如下图所示</p>
                                <p><img src="http://on7c662n7.bkt.clouddn.com/vagrant_box_add_metadata.png" alt=""></p>
                            </li>
                        </ol>
                        <h3 id="h3--homestead-"><a name="克隆Homestead并初始化" class="reference-link"></a><span
                                    class="header-link octicon octicon-link"></span>克隆Homestead并初始化</h3>
                        <p>克隆代码仓库，推荐在当前用户的根目录中进行</p>
                        <pre class="prettyprint linenums prettyprinted"><ol class="linenums"><li class="L0"><code><span
                                                class="pln">cd </span><span class="pun">~</span></code></li><li
                                        class="L1"><code><span class="pln">git clone https</span><span
                                                class="pun">:</span><span class="com">//github.com/laravel/homestead.git Homestead</span></code></li></ol></pre>
                        <p>初始化，这个命令会创建 <strong>Homestead.yaml</strong> 文件，这个文件会被放置在 <strong>~/.homestead</strong> 目录中：
                        </p>
                        <pre class="prettyprint linenums prettyprinted"><ol class="linenums"><li class="L0"><code><span
                                                class="pln">bash init</span><span class="pun">.</span><span class="pln">sh</span></code></li></ol></pre>
                        <h3 id="h3--homestead"><a name="配置Homestead" class="reference-link"></a><span
                                    class="header-link octicon octicon-link"></span>配置Homestead</h3>
                        <ol>
                            <li><p>配置共享文件夹</p>
                                <p> 在 <strong>Homestead.yaml</strong> 文件的 <code>folders</code> 属性里列出所有想与 <strong>Homestead</strong>
                                    环境共享的文件夹。这些文件夹中的文件若有变更，它们将会在你的本机电脑与 Homestead 环境 <strong>自动更新同步</strong>
                                    。可以在这里设置多个共享文件夹：</p>
                                <pre class="prettyprint linenums prettyprinted"><ol class="linenums"><li
                                                class="L0"><code><span class="pln"> folders</span><span
                                                        class="pun">:</span></code></li><li class="L1"><code><span
                                                        class="pln">     </span><span class="pun">-</span><span
                                                        class="pln"> map</span><span class="pun">:</span><span
                                                        class="pln"> </span><span class="pun">~/</span><span
                                                        class="typ">Code</span></code></li><li class="L2"><code><span
                                                        class="pln">         to</span><span class="pun">:</span><span
                                                        class="pln"> </span><span class="str">/home/</span><span
                                                        class="pln">vagrant</span><span class="pun">/</span><span
                                                        class="typ">Code</span></code></li></ol></pre>
                                <p> 若要启用 <strong>NFS</strong>，只需要在共享文件夹的设置值中加入一个简单的参数：</p>
                                <pre class="prettyprint linenums prettyprinted"><ol class="linenums"><li
                                                class="L0"><code><span class="pln"> folders</span><span
                                                        class="pun">:</span></code></li><li class="L1"><code><span
                                                        class="pln">     </span><span class="pun">-</span><span
                                                        class="pln"> map</span><span class="pun">:</span><span
                                                        class="pln"> </span><span class="pun">~/</span><span
                                                        class="typ">Code</span></code></li><li class="L2"><code><span
                                                        class="pln">         to</span><span class="pun">:</span><span
                                                        class="pln"> </span><span class="str">/home/</span><span
                                                        class="pln">vagrant</span><span class="pun">/</span><span
                                                        class="typ">Code</span></code></li><li class="L3"><code><span
                                                        class="pln">       type</span><span class="pun">:</span><span
                                                        class="pln"> </span><span
                                                        class="str">"nfs"</span></code></li></ol></pre>
                            </li>
                            <li><p>配置站点信息</p>
                                <p><code>sites</code> 属性可以帮助你可以轻易指定一个 域名 来对应到 Homestead 环境中的一个目录上。在 Homestead.yaml
                                    文件中已包含了一个网站设置范本。同样的，你也可以增加多个网站到你的 Homestead 环境中。Homestead 可以同时为多个 Laravel 应用提供虚拟化环境：
                                </p>
                                <pre class="prettyprint linenums prettyprinted"><ol class="linenums"><li
                                                class="L0"><code><span class="pln"> sites</span><span
                                                        class="pun">:</span></code></li><li class="L1"><code><span
                                                        class="pln">     </span><span class="pun">-</span><span
                                                        class="pln"> map</span><span class="pun">:</span><span
                                                        class="pln"> homestead</span><span class="pun">.</span><span
                                                        class="pln">app</span></code></li><li class="L2"><code><span
                                                        class="pln">         to</span><span class="pun">:</span><span
                                                        class="pln"> </span><span class="str">/home/</span><span
                                                        class="pln">vagrant</span><span class="pun">/</span><span
                                                        class="typ">Code</span><span class="pun">/</span><span
                                                        class="typ">Laravel</span><span class="pun">/</span><span
                                                        class="kwd">public</span></code></li></ol></pre>
                                <p> 如果你在 Homestead box 配置之后更改了 sites 属性，那么应该重新运行 <code>vagrant reload --provision</code>
                                    来更新 Nginx 配置到虚拟机上。</p>
                                <blockquote>
                                    <p>配置的站点域名</p>
                                </blockquote>
                            </li>
                            <li><p>安装 MariaDB</p>
                                <p> 如果希望使用 <code>MariaDB</code> 来替换 <code>MySQL</code>，可以在 Homestead.yaml 文件中增加一个 <code>mariadb</code>
                                    的选项，这个选项会移除 MySQL 并安装 MariaDB。因为 MariaDB 可用作 MySQL 的替代品，所以在数据库配置信息里，还是选用 mysql 配置项。
                                </p>
                                <pre class="prettyprint linenums prettyprinted"><ol class="linenums"><li
                                                class="L0"><code><span class="pln"> box</span><span class="pun">:</span><span
                                                        class="pln"> laravel</span><span class="pun">/</span><span
                                                        class="pln">homestead</span></code></li><li
                                                class="L1"><code><span class="pln"> ip</span><span
                                                        class="pun">:</span><span class="pln"> </span><span class="str">"192.168.20.20"</span></code></li><li
                                                class="L2"><code><span class="pln"> memory</span><span
                                                        class="pun">:</span><span class="pln"> </span><span class="lit">2048</span></code></li><li
                                                class="L3"><code><span class="pln"> cpus</span><span
                                                        class="pun">:</span><span class="pln"> </span><span class="lit">4</span></code></li><li
                                                class="L4"><code><span class="pln"> provider</span><span
                                                        class="pun">:</span><span class="pln"> virtualbox</span></code></li><li
                                                class="L5"><code><span class="pln"> mariadb</span><span
                                                        class="pun">:</span><span class="pln"> </span><span class="kwd">true</span></code></li></ol></pre>
                            </li>
                            <li><p>连接端口</p>
                                <p> 以下本地电脑连接端口将会被转发至 Homestead 环境：</p>
                                <ul>
                                    <li>SSH：2222 → 转发至 22</li>
                                    <li>HTTP：8000 → 转发至 80</li>
                                    <li>HTTPS：44300 → 转发至 443</li>
                                    <li>MySQL：33060 → 转发至 3306</li>
                                    <li><p>Postgres：54320 → 转发至 5432</p>
                                        <p>如果需要的话，也可以修改 <strong>Homestead.yaml</strong> 借助指定连接端口的通信协议来转发更多额外的连接端口给
                                            Vagrant box：</p>
                                        <p>ports:</p>
                                        <ul>
                                            <li>send: 93000<br>to: 9300</li>
                                            <li>send: 7777<br>to: 777<br>protocol: udp</li>
                                        </ul>
                                        <p>在 Homestead 中，已经预装了 <strong>MySQL</strong> 与 <strong>Postgres</strong>
                                            两种数据库。如果想要从本机电脑上通过 <strong>Navicat</strong> 或者是 <strong>Sequel Pro</strong>
                                            来连接数据库，可以通过 <code>127.0.0.1</code> 来使用端口 <code>33060 (MySQL)</code> 或 <code>54320
                                                (Postgres)</code> 连接。帐号密码分别是 <code>homestead / secret</code>。</p>
                                    </li>
                                </ul>
                            </li>
                        </ol>
                        <h3 id="h3-u76F8u5173u64CDu4F5C"><a name="相关操作" class="reference-link"></a><span
                                    class="header-link octicon octicon-link"></span>相关操作</h3>
                        <ol>
                            <li><p>启动 Vagrant box</p>
                                <pre class="prettyprint linenums prettyprinted"><ol class="linenums"><li
                                                class="L0"><code><span class="pln"> cd </span><span class="typ">Homestead</span><span
                                                        class="pln"> </span></code></li><li class="L1"><code><span
                                                        class="pln"> vagrant up</span></code></li></ol></pre>
                            </li>
                            <li><p>关闭 Vagrant box</p>
                                <pre class="prettyprint linenums prettyprinted"><ol class="linenums"><li
                                                class="L0"><code><span class="pln"> cd </span><span class="typ">Homestead</span><span
                                                        class="pln"> </span></code></li><li class="L1"><code><span
                                                        class="pln"> vagrant halt</span></code></li></ol></pre>
                            </li>
                            <li><p>登录 Vagrant box</p>
                                <pre class="prettyprint linenums prettyprinted"><ol class="linenums"><li
                                                class="L0"><code><span class="pln"> cd </span><span class="typ">Homestead</span><span
                                                        class="pln"> </span></code></li><li class="L1"><code><span
                                                        class="pln"> vagrant ssh</span></code></li></ol></pre>
                            </li>
                            <li><p>移除 Vagrant box</p>
                                <pre class="prettyprint linenums prettyprinted"><ol class="linenums"><li
                                                class="L0"><code><span class="pln"> cd </span><span class="typ">Homestead</span><span
                                                        class="pln"> </span></code></li><li class="L1"><code><span
                                                        class="pln"> vagrant destroy </span><span
                                                        class="pun">--</span><span class="pln">force</span></code></li></ol></pre>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer id="footer" class="inner footer reveal text-center">
        ©&nbsp;2017&nbsp;-&nbsp;Jormin 的博客&nbsp;-&nbsp;
        <a target="_blank" rel="nofollow" href="http://www.miitbeian.gov.cn/" class="external beian">京ICP备15006639号</a>
    </footer>
</div>

<div id="cli_dialog_div"></div>
</body>
</html>