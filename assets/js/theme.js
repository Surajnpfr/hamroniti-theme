/* global HamroNitiTheme */

(function () {
  function qs(sel, root) {
    return (root || document).querySelector(sel);
  }

  function qsa(sel, root) {
    return Array.prototype.slice.call((root || document).querySelectorAll(sel));
  }

  function setProgressBar() {
    var bar = qs('#hnProgressBar');
    if (!bar) return;

    var doc = document.documentElement;
    var scrollTop = doc.scrollTop || document.body.scrollTop;
    var height = doc.scrollHeight - doc.clientHeight;
    var scrolled = height > 0 ? (scrollTop / height) * 100 : 0;
    bar.style.width = scrolled + '%';
  }

  function toggleSearch() {
    var panel = qs('#hnSearchPanel');
    if (!panel) return;

    var isHidden = panel.hasAttribute('hidden');
    if (isHidden) {
      panel.removeAttribute('hidden');
      var input = qs('input[type="search"]', panel);
      if (input) input.focus();
    } else {
      panel.setAttribute('hidden', '');
    }
  }

  function initHeader() {
    var searchBtn = qs('[data-hn-toggle-search]');
    if (searchBtn) searchBtn.addEventListener('click', toggleSearch);

    var searchClose = qs('[data-hn-close-search]');
    if (searchClose) searchClose.addEventListener('click', toggleSearch);

    var menuPanel = qs('#hnMenuPanel');
    var menuBtn = qs('[data-hn-toggle-menu]');
    var menuClosers = qsa('[data-hn-close-menu]');

    function setMenuOpen(open) {
      if (!menuPanel || !menuBtn) return;
      if (open) {
        menuPanel.removeAttribute('hidden');
        menuBtn.setAttribute('aria-expanded', 'true');
        document.documentElement.classList.add('hn-menu-open');
      } else {
        menuPanel.setAttribute('hidden', '');
        menuBtn.setAttribute('aria-expanded', 'false');
        document.documentElement.classList.remove('hn-menu-open');
      }
    }

    if (menuBtn && menuPanel) {
      menuBtn.addEventListener('click', function () {
        var isHidden = menuPanel.hasAttribute('hidden');
        setMenuOpen(isHidden);
      });
    }

    menuClosers.forEach(function (el) {
      el.addEventListener('click', function () {
        setMenuOpen(false);
      });
    });

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') setMenuOpen(false);
    });
  }

  function initBottomNav() {
    var items = qsa('.hn-nav-item');
    if (!items.length) return;

    items.forEach(function (item) {
      item.addEventListener('click', function () {
        items.forEach(function (i) {
          i.classList.remove('is-active');
          var icon = qs('.material-symbols-outlined', i);
          if (icon) icon.style.fontVariationSettings = "'FILL' 0";
        });
        item.classList.add('is-active');
        var iconActive = qs('.material-symbols-outlined', item);
        if (iconActive) iconActive.style.fontVariationSettings = "'FILL' 1";
      });
    });
  }

  function initScroll() {
    window.addEventListener('scroll', setProgressBar, { passive: true });
    setProgressBar();
  }

  function initShare() {
    var shareBtn = qs('.hn-article-meta-actions');
    if (!shareBtn) return;

    function ensureToast() {
      var toast = qs('#hnShareToast');
      if (toast) return toast;
      toast = document.createElement('div');
      toast.id = 'hnShareToast';
      toast.className = 'hn-toast';
      document.body.appendChild(toast);
      return toast;
    }

    function showToast(message) {
      var toast = ensureToast();
      toast.textContent = message;
      toast.classList.add('is-visible');
      window.setTimeout(function () {
        toast.classList.remove('is-visible');
      }, 1800);
    }

    shareBtn.addEventListener('click', function () {
      var shareData = {
        title: document.title,
        url: window.location.href
      };

      if (navigator.share) {
        navigator.share(shareData)["catch"](function () {
          // User cancelled or share failed; silently ignore.
        });
        return;
      }

      var url = window.location.href;
      if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(url).then(function () {
          showToast('Link copied');
        })["catch"](function () {
          showToast('Copy failed');
        });
        return;
      }

      // Fallback for very old browsers.
      var temp = document.createElement('input');
      temp.value = url;
      document.body.appendChild(temp);
      temp.select();
      try {
        document.execCommand('copy');
        showToast('Link copied');
      } catch (e) {
        showToast('Copy failed');
      }
      document.body.removeChild(temp);
    });
  }

  document.addEventListener('DOMContentLoaded', function () {
    initHeader();
    initBottomNav();
    initScroll();
    initShare();
  });
})();

