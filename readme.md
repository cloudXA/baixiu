
# 心得

## 往事

在学习前端的漫长的过程中，我曾经试着理解前端到底在做些什么，能做什么。我试着询问看书、博客、询问一些工作的的人，他们给出的答案有些是调侃着说，切图，作页面，也有一本正经的谈的说做交互、提升用户体验。我尝试着在纷繁复杂的前端知识体系中寻找答案，但是我学到的越多，我发现我困惑的越多，纸上得来终觉浅，绝知此事要躬行。我再练习中逐渐掌握了一些页面的切图，js操作出的动态效果，又从jQuery封装的api中，做出来更过的效果。在这一阶段，我渐渐的知道了函数的封装，了解了js底层的实现。我觉的自己能够做出了页面效果出来后，我就试着去面试，结果竟然面试成功了，我忐忑的工作了一个星期，发现我并不知道后端给出的文件架构，gulp流的自动注入，angularjs的路由单页面还有mvc的设计模式对应的单页面应用，后端数据库的增删改查出来的数据，如何将后端给出的数据通过js模板进行渲染，less预处理等。然后我又重新了我的学习。

## 百秀

在最开始学习php+mysql+apache+前端的时候，其实我是拒绝的，我发现配置后端环境好陌生，和前端的操作的不同，产生了抗拒学习的心理，但是听到了教程up主汪磊的解释称：不学后端前端js学不到什么水平的，信以为真的我坚持了下来，我遇到的问题其实不是什么命令行的原因，因为之前很久，自己因为v2ray的配置需要，积累足够应付的命令行基础，主要是一些配置文件问题，这个有些麻烦。



百秀的学习中，我从原始的同步请求，响应，请求，响应，到异步请求加载。从字符串手动拼接到js前端模板。从php接口逻辑，到ajax请求的接口。从php操作数据库到数据库的命令行和navicat,从文档的分类到项目架构，还有许多工作的经验，这是在一般教程中学不到的，毕竟学到的是知识，而实际解决问题留下的是经验，这种经验性的东西，很少有人会愿意和你分享，他们往往会给你说一些知识，但是经验的东西，却很少。



## 业务

### 后端：php+mysql

从这里我了解到了，后端如何通过php连接数据库，如何获取查询数据库，如何处理关联数组，然后如何设置表头json,并将从数据库获取的数据以json的方式等待客户端获取。

### 协议

这里学习的http1.1,前后端交互的通信协议，如何识别请求头，响应头，通过inspect了解响应的状态码，如何让无状态的http，记录用户，通过cookie和更加安全的session方式，虽然是PHP完成的，但是我确实知道了如何实现和为什么实现了。

### 前端

在早期的时候，本人深信学习原生是多么了不起的事情，在我学习了jQuery和js模板引擎提供的render函数接口后，我发现原生给了我理解他们的基础，我更发现这些框架或者库用起来真香！

我通过ajax，（浏览器提供的一个api），通过指定需要响应的服务器地址，同时获取他提供给我前端的json数据，通过js渲染，进行数据绑定，在具有php混编的情况下，echo 让我觉得数据绑定如此简单，但是当我单纯使用js进行res的数据渲染时，我发现使用大量的字符串拼接，是如此的耗时与复杂。其后出现的js模板引擎一下子让我从耗时的字符串拼接解放了出来。我也知道了，如何通过js获取属性的数据值，然后通过post的方式传递给后端，后端逻辑处理后返回给前端，前端继续渲染页面。这也让我对标签的属性有了更进一步的认识。

### ps： 

不知道是up主故意为之还是别的原因，up主在视频中中间，留了自己的github,我马上就关注了，果然没让我失望，zce一直都在更新自己的github，他的教程目前我觉的最棒的教程了。










