<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!--评论-->
<?php function threadedComments($comments, $options)
{
    $commentClass = $authorIdIcon = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
            $authorIdIcon = '<i class="fa fa-heart-o" aria-hidden="true" title="博主">博主</i>';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }
    $commentLevelClass = $comments->levels > 0 ? ' comment-children' : ' comment-parent';
    ?>
    <li id="li-<?php $comments->theId(); ?>" class="comment<?php
    if ($comments->levels > 0) {
        echo ' comment-children';
        $comments->levelsAlt(' thread-level-odd', ' thread-level-even');
    } else {
        echo ' comment-parent';
    }
    echo $commentClass;
    ?>">
        <div id="<?php $comments->theId(); ?>" class="media-list">
            <div class="coms_avatar media-left"><?php $comments->gravatar('40', ''); ?></div>
            <div class="coms_main media-body">
                <div class="coms_meta">
                    <div class="coms_author">
                        <span rel="external nofollow" class="url media-heading"><?php $comments->author(); ?></span>
                    </div>
                    <div class="reply">
                        <a href="<?php $comments->permalink(); ?>"><?php $comments->date(); ?></a>
                        <span class="reply-content">
	                    	<?php $comments->reply(); ?>
	                    </span>
                    </div>
                </div>
                <?php if ('waiting' == $comments->status): ?>
                    <span class="comments-waiting"><?php $options->commentStatus(); ?></span>
                <?php endif; ?>
                <p>
                    <?php $comments->content(); ?>
                </p>
            </div>
        </div>
        <?php if ($comments->children) { ?>
            <div class="children">
                <?php $comments->threadedComments($options); ?>
            </div>
        <?php } // if ($comments->children) else
        ?>
    </li>
<?php } // threadedComments() End ?>


<div id="comments">
    <?php $this->comments()->to($comments); ?>
    <div class="comments-header" id="<?php $this->respondId(); ?>">
        <?php if ($this->allow('comment')): ?>
            <form action="<?php $this->commentUrl() ?>" method="post" id="commentform">
                <h3 class="coms_underline">
                    添加评论
                </h3>
                <div id="comment-author-info input-group">
                    <?php if ($this->user->hasLogin()): ?>
                        <div>
                            <a href="<?php $this->options->profileUrl(); ?>">
                                <?php $this->user->screenName(); ?>
                                <?php _e('已登录'); ?>
                            </a>.
                            <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?>&raquo;</a>
                        </div>
                    <?php else: // if($this->user->hasLogin()) else  ?>
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="author" id="author"
                                       value="<?php $this->remember('author'); ?>" size="14" required
                                       placeholder="昵称（必填）" aria-describedby="sizing-addon2">
                            </div>
                            <div class="col-md-4">
                                <input class="form-control" placeholder="邮箱（必填）" aria-describedby="sizing-addon2"
                                       type="email" name="mail" id="email" value="<?php $this->remember('mail'); ?>"
                                       size="25"
                                    <?php echo $this->options->commentsRequireMail ? 'required' : ''; ?> >
                                <?php echo $this->options->commentsRequireMail ? '' : ''; ?>
                            </div>
                            <div class="col-md-4">
                                <input type="url" class="form-control" placeholder="网址（选填）"
                                       aria-describedby="sizing-addon2" name="url" id="url"
                                       value="<?php $this->remember('url'); ?>" size="36"
                                    <?php echo $this->options->commentsRequireURL ? 'required' : ''; ?>
                                       placeholder="<?php _e('http://'); ?>">
                                <?php echo $this->options->commentsRequireURL ? '<em>*</em>' : ''; ?>
                            </div>
                        </div>
                    <?php endif; // if($this->user->hasLogin()) endif ?>
                </div>
                <div class="post-aread">
                    <textarea class="form-control" placeholder="来都来了，还不说两句？" aria-describedby="sizing-addon2"
                              name="text" id="comment" required cols="100%"
                              rows="7"><?php $this->remember('text'); ?></textarea>
                </div>
                <div class="subcon">
                    <button class="btn btn-default"><?php _e('提交评论'); ?></button>
                    <div class="cancel-comment"><?php $comments->cancelReply(); ?></div>
                </div>
            </form>
        <?php endif; ?>
    </div>
    <?php if ($comments->have()): ?>
        <?php $comments->listComments(); ?>
        <?php $comments->pageNav(); ?>
    <?php endif; ?>
</div>