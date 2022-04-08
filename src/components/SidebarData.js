import React from 'react';
import * as FaIcons from 'react-icons/fa';
import * as BsIcons from 'react-icons/bs';
import * as RiIcons from 'react-icons/ri';
import * as GoIcons from 'react-icons/go';

export const SidebarData = [
  {
    title: 'Admin',
    icon: <RiIcons.RiAdminFill />,
    iconClosed: <RiIcons.RiArrowDownSFill />,
    iconOpened: <RiIcons.RiArrowUpSFill />,

    subNav: [
      {
        title: 'Create New User',
        path: '/admin/add_user',
        icon: <RiIcons.RiUserAddFill />
      },
      {
        title: 'Edit User',
        path: '/admin/edit_user',
        icon: <FaIcons.FaUserEdit />
      }
    ]
  },
  {
    title: 'Cases',
    icon: <BsIcons.BsBriefcaseFill />,
    iconClosed: <RiIcons.RiArrowDownSFill />,
    iconOpened: <RiIcons.RiArrowUpSFill />,

    subNav: [
      {
        title: 'New Case',
        path: '/cases/add_case',
        icon: <BsIcons.BsFillPlusCircleFill />,
        cName: 'sub-nav'
      },
      {
        title: 'Case List',
        path: '/cases/case_list',
        icon: <BsIcons.BsCardList />,
        cName: 'sub-nav',
      },
      {
        title: 'Indicies Search',
        path: '/cases/indicies_search',
        icon: <BsIcons.BsSearch />
      },
      {
        title: 'Case Metrics',
        path: '/cases/case_metrics',
        icon: <GoIcons.GoGraph />
      }
    ]
  },
  {
    title: 'Edit Credentials',
    path: '/editcredentials/edit',
    icon: <BsIcons.BsPencilSquare />
  }
];
