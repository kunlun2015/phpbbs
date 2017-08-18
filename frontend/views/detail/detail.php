<?php
/**
 * 详情
 * @authors: Amos (735767227@qq.com)
 * @date: 2017-08-16 18:16
 * @version $Id$
 */

    $this->title = '详情';
    \frontend\assets\AppAsset::addCss($this, 'static/css/detail.css');
?>
<div class="wrap">
    <ul class="nav-title">
        <li><a href="">PHP技术</a></li>
        <li><a href="">PHP基础</a></li>
    </ul>
    <div class="left">
        <div class="article">
            <p class="title">Apache Flink 技术解读之分布式运行时环境</p>
            <p class="article-attr">
                <span>来源：管理员</span>
                <span>时间：2017-08-18</span>
                <span>阅读数：150</span>
                <span>作者：Kunlun</span>
            </p>
            <div class="abstract">
                <strong>摘要：</strong>任务与运算符链接在实际的分布式计算环境中，Flink 会将多个运算子任务链接到分布式计算任务中。每个线程执行一个计算任务。将运算符链接到计算任务中对于系统性能的提升有很大的帮助：它降低了线程间切换与缓冲的开 ...
            </div>
            <div class="article-body">
                <div class="page_main">
                    <div class="main_container">
                        <!--文章内容-->
                        <h3 style="text-align: justify; color: rgb(51, 51, 51); text-transform: none; line-height: 1.1; text-indent: 0px; letter-spacing: normal; font-family: &quot;microsoft yahei&quot;, arial; font-size: 24px; font-style: normal; font-weight: 500; margin-top: 20px; margin-bottom: 10px; word-spacing: 0px; white-space: normal; box-sizing: border-box; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;">任务与运算符链接</h3><p style="margin: 0px 0px 20px; text-align: justify; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: &quot;microsoft yahei&quot;, arial; font-size: 16px; font-style: normal; font-weight: normal; word-spacing: 0px; white-space: normal; box-sizing: border-box; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;">在实际的分布式计算环境中，Flink 会将多个运算子任务链接到分布式计算任务中。每个线程执行一个计算任务。将运算符链接到计算任务中对于系统性能的提升有很大的帮助：它降低了线程间切换与缓冲的开销，并且在降低延时的同时减少了系统的总体吞吐量。可以对这种链接操作进行配置，具体内容请参考链接文档。</p><p style="margin: 0px 0px 20px; text-align: justify; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: &quot;microsoft yahei&quot;, arial; font-size: 16px; font-style: normal; font-weight: normal; word-spacing: 0px; white-space: normal; box-sizing: border-box; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;">如下图所示的数据流图包含五个子任务，也就是说其中有五个并发执行的线程：</p><p style="margin: 0px 0px 20px; text-align: justify; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: &quot;microsoft yahei&quot;, arial; font-size: 16px; font-style: normal; font-weight: normal; word-spacing: 0px; white-space: normal; box-sizing: border-box; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;"></p><center style="color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: &quot;microsoft yahei&quot;, arial; font-size: 16px; font-style: normal; font-weight: normal; word-spacing: 0px; white-space: normal; box-sizing: border-box; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;"><img title="" style="margin: auto; border: 0px currentColor; border-image: none; vertical-align: middle; display: table; max-width: 100%; box-sizing: border-box;" alt="图片描述" src="http://img.blog.csdn.net/20170817132113102"></center><p style="margin: 0px 0px 20px; text-align: justify; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: &quot;microsoft yahei&quot;, arial; font-size: 16px; font-style: normal; font-weight: normal; word-spacing: 0px; white-space: normal; box-sizing: border-box; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;"></p><h3 style="text-align: justify; color: rgb(51, 51, 51); text-transform: none; line-height: 1.1; text-indent: 0px; letter-spacing: normal; font-family: &quot;microsoft yahei&quot;, arial; font-size: 24px; font-style: normal; font-weight: 500; margin-top: 20px; margin-bottom: 10px; word-spacing: 0px; white-space: normal; box-sizing: border-box; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;">作业管理器，任务管理器与客户端</h3><p style="margin: 0px 0px 20px; text-align: justify; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: &quot;microsoft yahei&quot;, arial; font-size: 16px; font-style: normal; font-weight: normal; word-spacing: 0px; white-space: normal; box-sizing: border-box; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;">Flink 运行时环境由两种类型进程组成：</p><ul style="text-align: justify; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: &quot;microsoft yahei&quot;, arial; font-size: 16px; font-style: normal; font-weight: normal; margin-top: 0px; margin-bottom: 20px; word-spacing: 0px; white-space: normal; box-sizing: border-box; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;"><li style="box-sizing: border-box;">作业管理器（也称为 master）用于协调程序的分布式执行。它的主要功能是调度任务，调整检查点，并在任务失败时安排恢复过程等。每个 Flink 环境中只有一个作业管理器。未来的高可用设计中会包含多个作业管理器，其中一个是 leader，其他作为备份程序。</li><li style="box-sizing: border-box;">任务管理器（也称为 worker）用于执行数据流图的任务（更准确地说，是计算子任务），并对数据流进行缓冲、交换。每个 Flink 环境中至少包含一个任务管理器。</li></ul><p style="margin: 0px 0px 20px; text-align: justify; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: &quot;microsoft yahei&quot;, arial; font-size: 16px; font-style: normal; font-weight: normal; word-spacing: 0px; white-space: normal; box-sizing: border-box; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;">可以以多种方式启动作业管理器和任务管理器：直接作为独立的集群在机器上启动，在容器中启动，或者通过<span>&nbsp;</span>YARN、Mesos这类资源框架进行管理。启动之后，任务管理器会主动上连到作业管理器来报告自身的状态，以便作业管理器来分配任务。</p><p style="margin: 0px 0px 20px; text-align: justify; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: &quot;microsoft yahei&quot;, arial; font-size: 16px; font-style: normal; font-weight: normal; word-spacing: 0px; white-space: normal; box-sizing: border-box; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;">客户端的主要作用是准备并向作业管理器发送数据流图，它实际上并不是运行时环境的一个组成部分。在发送完数据流图之后，客户端可以选择断开与作业管理器的连接，也可以继续保持连接以等待程序运行结果。客户端程序可以以 Java/Scala 程序的形式执行，也可以以命令行的形式（./bin/flink run …）执行。</p><p style="margin: 0px 0px 20px; text-align: justify; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: &quot;microsoft yahei&quot;, arial; font-size: 16px; font-style: normal; font-weight: normal; word-spacing: 0px; white-space: normal; box-sizing: border-box; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;"></p><center style="color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: &quot;microsoft yahei&quot;, arial; font-size: 16px; font-style: normal; font-weight: normal; word-spacing: 0px; white-space: normal; box-sizing: border-box; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;"><img title="" style="margin: auto; border: 0px currentColor; border-image: none; vertical-align: middle; display: table; max-width: 100%; box-sizing: border-box;" alt="图片描述" src="http://img.blog.csdn.net/20170817132655423"></center><p style="margin: 0px 0px 20px; text-align: justify; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: &quot;microsoft yahei&quot;, arial; font-size: 16px; font-style: normal; font-weight: normal; word-spacing: 0px; white-space: normal; box-sizing: border-box; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;"></p><h3 style="text-align: justify; color: rgb(51, 51, 51); text-transform: none; line-height: 1.1; text-indent: 0px; letter-spacing: normal; font-family: &quot;microsoft yahei&quot;, arial; font-size: 24px; font-style: normal; font-weight: 500; margin-top: 20px; margin-bottom: 10px; word-spacing: 0px; white-space: normal; box-sizing: border-box; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;">任务槽与资源</h3><p style="margin: 0px 0px 20px; text-align: justify; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: &quot;microsoft yahei&quot;, arial; font-size: 16px; font-style: normal; font-weight: normal; word-spacing: 0px; white-space: normal; box-sizing: border-box; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;">每个 worker（任务管理器）都是一个独立的 JVM 进程，每个子任务就是运行在其中的独立线程里。为了控制 worker 接收任务的数量，在 worker 中引入了任务槽的概念（每个 worker 中至少包含一个任务槽）。</p><p style="margin: 0px 0px 20px; text-align: justify; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: &quot;microsoft yahei&quot;, arial; font-size: 16px; font-style: normal; font-weight: normal; word-spacing: 0px; white-space: normal; box-sizing: border-box; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;">每个任务槽代表任务管理器中一个特定的资源池子集。例如，如果任务管理器有3个槽，它会为每个槽分配 1/3 的内存。将资源池槽化可以让子任务获取指定容量的内存资源，而避免同其他作业中的子任务竞争。注意，这里没有对 CPU 进行隔离；目前任务槽仅仅用于划分任务的内存。</p><p style="margin: 0px 0px 20px; text-align: justify; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: &quot;microsoft yahei&quot;, arial; font-size: 16px; font-style: normal; font-weight: normal; word-spacing: 0px; white-space: normal; box-sizing: border-box; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;">通过调整任务槽的数量，用户可以设定子任务之间独立运行的程度。如果任务管理器中只有一个槽，那么每个任务组都会在一个独立的 JVM（例如 JVM 可以在一个独立的容器中启动）中运行。任务管理器中配置更多的槽就意味着会有更多的子任务共享同一个 JVM。在同一个 JVM 中的任务会共享 TCP 连接（通过多路复用的方式）和心跳信息，同时他们也会共享数据集和数据结构，这在某种程度上可以降低单任务的开销。</p><p style="margin: 0px 0px 20px; text-align: justify; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: &quot;microsoft yahei&quot;, arial; font-size: 16px; font-style: normal; font-weight: normal; word-spacing: 0px; white-space: normal; box-sizing: border-box; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;"></p><center style="color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: &quot;microsoft yahei&quot;, arial; font-size: 16px; font-style: normal; font-weight: normal; word-spacing: 0px; white-space: normal; box-sizing: border-box; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;"><img title="" style="margin: auto; border: 0px currentColor; border-image: none; vertical-align: middle; display: table; max-width: 100%; box-sizing: border-box;" alt="图片描述" src="http://img.blog.csdn.net/20170817133721423"></center><p style="margin: 0px 0px 20px; text-align: justify; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: &quot;microsoft yahei&quot;, arial; font-size: 16px; font-style: normal; font-weight: normal; word-spacing: 0px; white-space: normal; box-sizing: border-box; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;"></p><p style="margin: 0px 0px 20px; text-align: justify; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: &quot;microsoft yahei&quot;, arial; font-size: 16px; font-style: normal; font-weight: normal; word-spacing: 0px; white-space: normal; box-sizing: border-box; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;">默认情况下，Flink 会允许同一个作业的多个子任务共享一个槽，即便这些子任务来自不同的任务。这种情况下，有可能会出现某个槽中包含一个完整的作业流水的场景。这样做主要有两点好处：</p><ul style="text-align: justify; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: &quot;microsoft yahei&quot;, arial; font-size: 16px; font-style: normal; font-weight: normal; margin-top: 0px; margin-bottom: 20px; word-spacing: 0px; white-space: normal; box-sizing: border-box; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;"><li style="box-sizing: border-box;">Flink 集群需要在作业中确保任务槽数量和程序并发量完全一致，而并不需要计算程序中任务（每个任务的并发量也许都不相同）的具体数量。</li><li style="box-sizing: border-box;">可以提高资源利用率。如果没有任务槽共享机制，非密集型的 source/map() 子任务就会和密集型的 window 子任务一样阻塞大量资源。如果有任务槽共享机制，在程序的并发量从 2 提高到 6 的情况下（举个例子），就可以让密集型子任务完全分散到任务管理器中，从而可以显著提高槽的资源利用率。</li></ul><p style="margin: 0px 0px 20px; text-align: justify; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: &quot;microsoft yahei&quot;, arial; font-size: 16px; font-style: normal; font-weight: normal; word-spacing: 0px; white-space: normal; box-sizing: border-box; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;"></p><center style="color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: &quot;microsoft yahei&quot;, arial; font-size: 16px; font-style: normal; font-weight: normal; word-spacing: 0px; white-space: normal; box-sizing: border-box; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;"><img title="" style="margin: auto; border: 0px currentColor; border-image: none; vertical-align: middle; display: table; max-width: 100%; box-sizing: border-box;" alt="图片描述" src="http://img.blog.csdn.net/20170817133757351"></center><p style="margin: 0px 0px 20px; text-align: justify; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: &quot;microsoft yahei&quot;, arial; font-size: 16px; font-style: normal; font-weight: normal; word-spacing: 0px; white-space: normal; box-sizing: border-box; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;"></p><p style="margin: 0px 0px 20px; text-align: justify; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: &quot;microsoft yahei&quot;, arial; font-size: 16px; font-style: normal; font-weight: normal; word-spacing: 0px; white-space: normal; box-sizing: border-box; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;">Flink API 中包含一个资源组机制，可以避免不合理的任务槽共享。</p><p style="margin: 0px 0px 20px; text-align: justify; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: &quot;microsoft yahei&quot;, arial; font-size: 16px; font-style: normal; font-weight: normal; word-spacing: 0px; white-space: normal; box-sizing: border-box; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;">依照以往的经验来说，默认的任务槽数量应设置为 CPU 核心的数量。如果使用超线程技术，每个槽中甚至可以调度处理超过 2 个硬件线程。</p><h3 style="text-align: justify; color: rgb(51, 51, 51); text-transform: none; line-height: 1.1; text-indent: 0px; letter-spacing: normal; font-family: &quot;microsoft yahei&quot;, arial; font-size: 24px; font-style: normal; font-weight: 500; margin-top: 20px; margin-bottom: 10px; word-spacing: 0px; white-space: normal; box-sizing: border-box; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;">后端存储</h3><p style="margin: 0px 0px 20px; text-align: justify; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: &quot;microsoft yahei&quot;, arial; font-size: 16px; font-style: normal; font-weight: normal; word-spacing: 0px; white-space: normal; box-sizing: border-box; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;">通过键值对索引的数据结构保存在选定的后端存储中。有的后端存储将数据保存在内存中的哈希表中，而有的存储会使用<span>&nbsp;</span>RocksDB<span>&nbsp;</span>来保存键值对。除了定义保存状态的数据结构之外，后端存储还实现了获取键值对的特定时间点快照的功能，该功能可以将快照保存为检查点的一部分。</p><p style="margin: 0px 0px 20px; text-align: justify; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: &quot;microsoft yahei&quot;, arial; font-size: 16px; font-style: normal; font-weight: normal; word-spacing: 0px; white-space: normal; box-sizing: border-box; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;"></p><center style="color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: &quot;microsoft yahei&quot;, arial; font-size: 16px; font-style: normal; font-weight: normal; word-spacing: 0px; white-space: normal; box-sizing: border-box; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;"><img title="" style="margin: auto; border: 0px currentColor; border-image: none; vertical-align: middle; display: table; max-width: 100%; box-sizing: border-box;" alt="图片描述" src="http://img.blog.csdn.net/20170817133844431"></center><p style="margin: 0px 0px 20px; text-align: justify; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: &quot;microsoft yahei&quot;, arial; font-size: 16px; font-style: normal; font-weight: normal; word-spacing: 0px; white-space: normal; box-sizing: border-box; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;"></p><h3 style="text-align: justify; color: rgb(51, 51, 51); text-transform: none; line-height: 1.1; text-indent: 0px; letter-spacing: normal; font-family: &quot;microsoft yahei&quot;, arial; font-size: 24px; font-style: normal; font-weight: 500; margin-top: 20px; margin-bottom: 10px; word-spacing: 0px; white-space: normal; box-sizing: border-box; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;">保存点</h3><p style="margin: 0px 0px 20px; text-align: justify; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: &quot;microsoft yahei&quot;, arial; font-size: 16px; font-style: normal; font-weight: normal; word-spacing: 0px; white-space: normal; box-sizing: border-box; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;">使用数据流 API 的程序可以从指定的保存点恢复。保存点具备更新程序和 Flink 集群而不丢失任何状态的功能。</p><p style="margin: 0px 0px 20px; text-align: justify; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: &quot;microsoft yahei&quot;, arial; font-size: 16px; font-style: normal; font-weight: normal; word-spacing: 0px; white-space: normal; box-sizing: border-box; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;">保存点可以看作是一种手动触发的检查点，该检查点可以获取程序的快照并将其写入后端存储中。所以说保存点的功能依赖于一般的检查点机制。程序执行时会定期在 worker 节点生成快照和检查点。由于 Flink 的恢复机制只需要使用最新一个有效的检查点，在新的检查点生成后就可以安全移除其余旧的检查点了。</p><p style="margin: 0px 0px 20px; text-align: justify; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: &quot;microsoft yahei&quot;, arial; font-size: 16px; font-style: normal; font-weight: normal; word-spacing: 0px; white-space: normal; box-sizing: border-box; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;">保存点和定期检查点在大部分情况下都很相似，区别只在于保存点是由用户触发的，并且在新的检查点生成后不会自动过期失效。保存点可以通过命令行生成，也可以在调用<span>&nbsp;</span>REST API<span>&nbsp;</span>取消作业时产生。</p>                                                            </div>

                </div>
            </div>
        </div>
    </div>
    <div class="right"></div>
</div>
