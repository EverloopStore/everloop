'use strict';

let _SidebarCollapseBuffer =
{
      isHidden: false,
};

// Realization
function StoreActiveLink()
{
      const links = document.querySelectorAll('a');
            links.forEach( node => 
            {
                  if (links[0] != node)
                  {
                        if (window.location.href.indexOf(node.href) >= 0) node.classList.add('active');
                  }
            });
}

function StoreSideBarInit()
{
      const Collapse = document.querySelector('#store-collapse');
            Collapse.addEventListener('click', StoreSideBarCollapse);

      setTimeout(() => 
      {
            if (_SidebarCollapseBuffer.isHidden === false)
            {
                  StoreSideBarHide();
                  _SidebarCollapseBuffer.isHidden = true;
            }
      }, 2000);
}

function StoreSideBarCollapse()
{
      if (_SidebarCollapseBuffer.isHidden)
      {
            _SidebarCollapseBuffer.isHidden = false;
            StoreSideBarShow();
      } else {
            _SidebarCollapseBuffer.isHidden = true;
            StoreSideBarHide();
      }
}

function StoreSideBarHide()
{
      const Bar = document.querySelector('.store-sidebar');
      const BarContainer = document.querySelector('.store-column-left');
      const Content = document.querySelector('.store-column-right');
      const Button = document.querySelector('#store-collapse');

      BarContainer.classList.add('collapsed');
      Content.classList.add('collapsed');

      Bar.children[0].children[0].classList.add('collapsed');
      Button.children[0].classList.add('collapsed');

      const p = Bar.querySelectorAll('p');
            p.forEach( node => 
            {
                  node.classList.add('collapsed');
            });
}

function StoreSideBarShow()
{
      const Bar = document.querySelector('.store-sidebar');
      const BarContainer = document.querySelector('.store-column-left');
      const Content = document.querySelector('.store-column-right');
      const Button = document.querySelector('#store-collapse');

      BarContainer.classList.remove('collapsed');
      Content.classList.remove('collapsed');

      Bar.children[0].children[0].classList.remove('collapsed');
      Button.children[0].classList.remove('collapsed');

      const p = Bar.querySelectorAll('p');
            p.forEach( node => 
            {
                  node.classList.remove('collapsed');
            });
}

function StoreSearchDropdownInit()
{
      const button = document.querySelector('#StoreSearchDropdown');
      const Items = 
            document
            .querySelector('#StoreSearchDropdownItems')
            .querySelectorAll('.search')
            .forEach( node => 
            {
                  node.addEventListener(
                        'click',
                        function (e) {
                              StoreSearchDropdownEvent(node);
                        }
                  );
            });

      const inputs = document.querySelectorAll('.store-input');
            inputs.forEach( node => 
            {
                  node.parentNode.classList.remove('disabled');
                  node.parentNode.classList.add('disabled');
                  if (node.dataset.name === button.innerHTML)
                  {
                        node.parentNode.classList.remove('disabled');
                  }
            });
}

function StoreSearchDropdownEvent(element)
{
      const button = document.querySelector('#StoreSearchDropdown')
                             .innerHTML = element.innerHTML;
      const inputs = document.querySelectorAll('.store-input');
            inputs.forEach( node => 
            {
                  node.parentNode.classList.remove('disabled');
                  node.parentNode.classList.add('disabled');
                  if (element.dataset.provider === node.dataset.name)
                  {
                        node.parentNode.classList.remove('disabled');
                  }
            });
}


// Calling
StoreActiveLink();
StoreSideBarInit();
StoreSearchDropdownInit();